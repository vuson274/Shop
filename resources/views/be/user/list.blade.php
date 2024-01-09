@extends('be.layout')
@section('content')
    <div class="col-lg-12">
        <h2>QUẢN TRỊ VIÊN</h2>
        <div class="text-right" >
            <button class="btn btn-success" data-toggle="modal" data-target="#modalinsert"> Thêm</button>
        </div>
        <div><hr></div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead class="table">
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Loại tài khoản</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        @if($item->level == 1)
                            Quản trị viên
                        @else
                            Người dùng
                        @endif
                    </td>
                    <td>
                        <button array="{{$item}}" id="{{$item->id}}" class="edituser btn btn-warning">Sửa</button>
                        <a class="btn btn-danger" href="{{route('admin.user.delete',['id'=>$item->id])}}" onclick="return confirm('Bạn có muốn xoá ?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="modalinsert" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin.user.add')}}"  method="post"   role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <legend>Thêm thông tin User</legend>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Tên</label><span id="errorname">@error('name'){{$message}}@enderror</span>
                                <input type="text" class="form-control"  id="name" name="name"   value="" onblur="checkname()"; Required />
                            </div>

                            <div class="form-group">
                                <label for="">Email</label> <span id="erroremail">@error('email'){{$message}}@enderror</span>
                                <input type="text" class="form-control"  id="email" name="email"  value="" onblur="checkEmail();" Required>
                            </div>


                            <div class="form-group">
                                <label for="">password</label> <span id="errorpassword">@error('password'){{$message}}@enderror</span>
                                <input type="password" class="form-control" id="password" name="password"   value="" onblur="checkPass();" Required>
                            </div>

                            <div class="form-group">
                                <label for="">phone</label> <span id="errorphone">@error('phone'){{$message}}@enderror</span>
                                <input type="number" class="form-control" id="phone" name="phone" value="" onblur="checkPhone();" Required>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit"  name="insert" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalupdate" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin.user.edit')}}"  method="post"   role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <legend>Sửa thông tin User</legend>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" class="form-control"  id="eid" name="id" readonly="">
                            </div>

                            <div class="form-group">
                                <label for="">Tên</label> <span id="errorname"></span>
                                <input type="text" class="form-control"  id="ename" name="name"   value="" onblur="checkname()"; Required />
                            </div>

                            <div class="form-group">
                                <label for="">Email</label> <span id="erroremail"></span>
                                <input type="text" class="form-control"  id="eemail" name="email"  value="" onblur="checkEmail();" Required>
                            </div>


                            <div class="form-group">
                                <label for="">password</label> <span id="errorpassword"></span>
                                <input type="password" class="form-control" id="epassword" name="password"   value="" onblur="checkPass();" Required>
                            </div>

                            <div class="form-group">
                                <label for="">phone</label> <span id="errorphone"></span>
                                <input type="number" class="form-control" id="ephone" name="phone" value="" onblur="checkPhone();" Required>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit"  name="insert" class="btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection