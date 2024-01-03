<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    const CART_KEY = 'CART';
    public function ckeckOut(Request $request){
        $total = 0;
        if ($request->session()->exists(self::CART_KEY)){
            $carts = $request->session()->get(self::CART_KEY);
            foreach ($carts as $cart){
                $total += $cart['product']['price']* $cart['quantity'];
            }
        }
        return view('fe.check-out', compact('total'));
    }

    public function vnpay(Request $request){
        $total = 0;
        if ($request->session()->exists(self::CART_KEY)){
            $carts = $request->session()->get(self::CART_KEY);
            foreach ($carts as $cart){
                $total += $cart['product']['price']* $cart['quantity'];
            }
        }
        return view('fe.check-out-vnpay', compact('total'));
    }

    public function makeOrder(Request $request){
        try {
            DB::beginTransaction();
            $total = 0;
            if ($request->session()->exists(self::CART_KEY)){
                $carts = $request->session()->get(self::CART_KEY);
                foreach ($carts as $cart){
                    $total += $cart['product']['price']* $cart['quantity'];
                }
            }
            $data = $request->all();
            $orderCode = time().$total.Auth::user()->id;
            $order = Order::create([
               'user_id'=>Auth::user()->id,
               'total_price' => $total,
               'note'=> $data['note'],
               'name'=>$data['name'],
               'phone'=>$data['phone'],
               'address'=>$data['address'],
               'method'=>1,
               'status'=>1,
               'order_code'=>$orderCode,
           ]);
            foreach ($carts as $cart){
                OrderDetail::create([
                    'order-id'   => $order->id,
                    'product_id' => $cart['product']['id'],
                    'quantity'   => $cart['quantity'],
                    'price'      => $cart['product']['price'],
                    'total'      => $cart['product']['price'] * $cart['quantity'],
                ]);

                $product  = Product::find($cart['product']['id']);
                $product['sold'] = $product['sold']+$cart['quantity'];
                $product['quantity'] = $product['quantity'] - $cart['quantity'];
                $dataPro = [
                    "category_id" => $product->category->id,
                    "name" => $product['name'],
                    "quantity" => $product['quantity'],
                    "price" => $product['price'],
                    "main_image" => $product['main_image'],
                    "second_image" => $product['second_image'],
                    "sold" => $product['sold'],
                    "origin" => $product['origin'],
                    "content" => $product['content'],
                ];
                Product::where('id', $cart['product']['id'])->update($dataPro);
            }
            $mail = $data['email'];
            $name = $data['name'];
            Mail::send('fe.email', compact('name','mail','carts','total','orderCode'), function ($email) use ($mail, $name, $carts, $total,$orderCode){
                $email->subject('Thông báo đơn hàng');
                $email->to($mail,$name,$carts,$total,$orderCode);
            });
            $request->session()->pull(self::CART_KEY);
            DB::commit();
            return redirect()->route('home')->with('success','Đặt hàng thành công');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('success','Đặt hàng không thành công');
        }

    }


    public function makeOrderVnpay(Request $request){
        $total = 0;
        if ($request->session()->exists(self::CART_KEY)){
            $carts = $request->session()->get(self::CART_KEY);
            foreach ($carts as $cart){
                $total += $cart['product']['price']* $cart['quantity'];
            }
        }
        $data = implode("&",$request->all());
        $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl  = 'http://127.0.0.1:8000/vnpay/'.$data;
        $vnp_TmnCode    = "NLBDBXPW";//Mã website tại VNPAY
        $vnp_HashSecret = "ZEDPTDVNNKVDILBPEPVKDKEEJGYECQKB"; //Chuỗi bí mật

        $vnp_TxnRef = time().$total.Auth::user()->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "thanh toán đơn hàng";
        $vnp_OrderType = "billpayment";
        $vnp_Amount    = $total * 100;
        $vnp_Locale    = "vn";
        $vnp_BankCode  = "NCB";
        $vnp_IpAddr    = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        // //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email  = $_POST['txt_billing_email'];
        // $fullName        = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name               = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName  = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City    = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State   = $_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone    = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email    = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address  = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company  = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode  = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type     = $_POST['cbo_inv_type'];
        $inputData        = [
            "vnp_Version"        => "2.1.0",
            "vnp_TmnCode"        => $vnp_TmnCode,
            "vnp_Amount"         => $vnp_Amount,
            "vnp_Command"        => "pay",
            "vnp_CreateDate"     => date('YmdHis'),
            "vnp_CurrCode"       => "VND",
            "vnp_IpAddr"         => $vnp_IpAddr,
            "vnp_Locale"         => $vnp_Locale,
            "vnp_OrderInfo"      => $vnp_OrderInfo,
            "vnp_OrderType"      => $vnp_OrderType,
            "vnp_ReturnUrl"      => $vnp_Returnurl,
            "vnp_TxnRef"         => $vnp_TxnRef,
            // "vnp_ExpireDate"     => $vnp_ExpireDate,
            // "vnp_Bill_Mobile"    => $vnp_Bill_Mobile,
            // "vnp_Bill_Email"     => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName"  => $vnp_Bill_LastName,
            // "vnp_Bill_Address"   => $vnp_Bill_Address,
            // "vnp_Bill_City"      => $vnp_Bill_City,
            // "vnp_Bill_Country"   => $vnp_Bill_Country,
            // "vnp_Inv_Phone"      => $vnp_Inv_Phone,
            // "vnp_Inv_Email"      => $vnp_Inv_Email,
            // "vnp_Inv_Customer"   => $vnp_Inv_Customer,
            // "vnp_Inv_Address"    => $vnp_Inv_Address,
            // "vnp_Inv_Company"    => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode"    => $vnp_Inv_Taxcode,
            // "vnp_Inv_Type"       => $vnp_Inv_Type
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query    = "";
        $i        = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i        = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url       .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = ['code'      => '00'
                       , 'message' => 'success'
                       , 'data'    => $vnp_Url];
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function vnpayReturn($data,Request $request){
        $data = explode('&',$data);
        $dataVnpay = $request->toArray();
        if ($dataVnpay['vnp_ResponseCode'] == 00){
            try {
                DB::beginTransaction();
                $total = 0;
                if ($request->session()->exists(self::CART_KEY)){
                    $carts = $request->session()->get(self::CART_KEY);
                    foreach ($carts as $cart){
                        $total += $cart['product']['price']* $cart['quantity'];
                    }
                }
                $orderCode = $dataVnpay['vnp_TxnRef'];
                $order = Order::create([
                                           'user_id'=> Auth::user()->id,
                                           'total_price' => $total,
                                           'note'=> $data[5],
                                           'name'=>$data[1],
                                           'phone'=>$data[3],
                                           'address'=>$data[2],
                                           'method'=>2,
                                           'status'=>1,
                                           'order_code'=>$orderCode,
                                       ]);
                foreach ($carts as $cart) {
                    OrderDetail::create([
                                            'order-id'   => $order->id,
                                            'product_id' => $cart['product']['id'],
                                            'quantity'   => $cart['quantity'],
                                            'price'      => $cart['product']['price'],
                                            'total'      => $cart['product']['price'] * $cart['quantity'],
                                        ]);
                    $product = Product::find($cart['product']['id']);
                    $product['sold'] = $product['sold'] + $cart['quantity'];
                    $product['quantity'] = $product['quantity'] - $cart['quantity'];
                    $dataPro =[
                        "category_id" => $product->category->id,
                        "name" => $product['name'],
                        "quantity" => $product['quantity'],
                        "price" => $product['price'],
                        "main_image" => $product['main_image'],
                        "second_image" => $product['second_image'],
                        "sold" => $product['sold'],
                        "origin" => $product['origin'],
                        "content" => $product['content'],
                    ];
                    Product::where('id', $cart['product']['id'])->update($dataPro);
                    $name = $data[1];
                    $mail = $data[4];
                    Mail::send('fe.email',compact('name','mail','carts','total','orderCode'),function ($email) use ($total, $name,$mail,$carts,$orderCode) {
                        $email->subject('Thông báo đơn hàng');
                        $email->to($mail,$name,$carts,$total,$orderCode);
                    });
                }
                $request->session()->pull(self::CART_KEY);
                DB::commit();
                return redirect()->route('home')->with('success','đặt hàng thành công');
            }catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('error','Đặt hàng thất bại');
            }
        }else{
            return redirect()->route('checkout-vnpay')->with('errorr', 'Thanh toán không thành công');
        }
    }
}
