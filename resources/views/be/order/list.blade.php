@extends('be.layout')
@section('content')
    <div class="col-lg-12">
        <h2>ĐƠN HÀNG</h2>
        <div><hr></div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead class="table">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Người nhận</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Phương thức thanh toán</th>
                    <th>Ngày đặt hàng</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item->order_code}}</td>
                        <td>{{$item->name}}</td>
                        @if($item->status == 1)
                            <td>Đang đóng gói</td>
                        @elseif($item->status == 2)
                            <td>Đang giao hàng</td>
                        @elseif($item->status == 3)
                            <td> Đã giao hàng</td>
                        @elseif($item->status == 4)
                            <td> Đã hủy</td>
                        @endif
                        @if($item->method == 1)
                            <td>Thanh toán tiền mặt</td>
                        @else
                            <td>Thanh toán qua vnpay</td>
                        @endif
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->note}}</td>
                        <td>
                            <a  href="{{route('admin.order.detail', ['id'=>$item->id])}}" class="btn btn-success">Chi tiết</a>
                            <button array="{{$item}}" id="{{$item->id}}" class="editstatus btn btn-warning">Cập nhật</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modalupdate" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.order.edit')}}"  method="post"   role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <legend>Cập nhật trạng thái đơn hàng</legend>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control"  id="eid" name="id" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="">Tình trạng đơn hàng</label>
                            <select id="status" name="status" class="form-control" >
                                <option value="1">Đang đóng gói</option>
                                <option value="2">Đang giao hàng</option>
                                <option value="3">Đã nhận hàng</option>
                                <option value="4">Đã hủy</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit"  name="insert" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection