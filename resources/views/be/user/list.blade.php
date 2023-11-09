@extends('be.layout')
@section('content')
    <div class="col-lg-12">
        <h2>QUẢN TRỊ VIÊN</h2>
        <div class="text-right" >
            <button class="btn btn-success" data-toggle="modal" data-target="#modalinsert"> Thêm</button>
        </div>
        <div><hr></div>
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
                                <label for="">Tên</label> <span id="errorname"></span>
                                <input type="text" class="form-control"  id="name" name="name"   value="" onblur="checkname()"; Required />
                            </div>

                            <div class="form-group">
                                <label for="">Email</label> <span id="erroremail"></span>
                                <input type="text" class="form-control"  id="email" name="email"  value="" onblur="checkEmail();" Required>
                            </div>


                            <div class="form-group">
                                <label for="">password</label> <span id="errorpassword"></span>
                                <input type="password" class="form-control" id="password" name="password"   value="" onblur="checkPass();" Required>
                            </div>

                            <div class="form-group">
                                <label for="">phone</label> <span id="errorphone"></span>
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
    </div>
@endsection