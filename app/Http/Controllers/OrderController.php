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
            $order = Order::create([
               'user_id'=>Auth::user()->id,
               'total_price' => $total,
               'note'=> $data['note'],
               'name'=>$data['name'],
               'phone'=>$data['phone'],
               'address'=>$data['address'],
               'method'=>1,
               'status'=>1,
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
            Mail::send('fe.email', compact('name','mail','carts','total'), function ($email) use ($mail, $name, $carts, $total){
                $email->subject('Thông báo đơn hàng');
                $email->to($mail,$name,$carts,$total);
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
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl  = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode    = "";//Mã website tại VNPAY
        $vnp_HashSecret = ""; //Chuỗi bí mật

        $vnp_TxnRef
                       = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount    = $_POST['amount'] * 100;
        $vnp_Locale    = $_POST['language'];
        $vnp_BankCode  = $_POST['bank_code'];
        $vnp_IpAddr    = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        $vnp_Bill_Email  = $_POST['txt_billing_email'];
        $fullName        = trim($_POST['txt_billing_fullname']);
        if (isset($fullName) && trim($fullName) != '') {
            $name               = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName  = array_pop($name);
        }
        $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        $vnp_Bill_City    = $_POST['txt_bill_city'];
        $vnp_Bill_Country = $_POST['txt_bill_country'];
        $vnp_Bill_State   = $_POST['txt_bill_state'];
        // Invoice
        $vnp_Inv_Phone    = $_POST['txt_inv_mobile'];
        $vnp_Inv_Email    = $_POST['txt_inv_email'];
        $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        $vnp_Inv_Address  = $_POST['txt_inv_addr1'];
        $vnp_Inv_Company  = $_POST['txt_inv_company'];
        $vnp_Inv_Taxcode  = $_POST['txt_inv_taxcode'];
        $vnp_Inv_Type     = $_POST['cbo_inv_type'];
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
            "vnp_ExpireDate"     => $vnp_ExpireDate,
            "vnp_Bill_Mobile"    => $vnp_Bill_Mobile,
            "vnp_Bill_Email"     => $vnp_Bill_Email,
            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            "vnp_Bill_LastName"  => $vnp_Bill_LastName,
            "vnp_Bill_Address"   => $vnp_Bill_Address,
            "vnp_Bill_City"      => $vnp_Bill_City,
            "vnp_Bill_Country"   => $vnp_Bill_Country,
            "vnp_Inv_Phone"      => $vnp_Inv_Phone,
            "vnp_Inv_Email"      => $vnp_Inv_Email,
            "vnp_Inv_Customer"   => $vnp_Inv_Customer,
            "vnp_Inv_Address"    => $vnp_Inv_Address,
            "vnp_Inv_Company"    => $vnp_Inv_Company,
            "vnp_Inv_Taxcode"    => $vnp_Inv_Taxcode,
            "vnp_Inv_Type"       => $vnp_Inv_Type
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
        // vui lòng tham khảo thêm tại code demo
    }

}
