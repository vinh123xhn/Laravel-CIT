@extends('layout.master')
@section('title')
    children
@endsection
@section('content_header_name')
    Tạo mới trẻ em
@endsection
@section('content_header_active')
    Tạo mới trẻ em
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới nhân viên y tế</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.children.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ngày sinh</label>
                        <input type="text" class="form-control" name="birthday" placeholder="Nhập ngày sinh">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cân nặng (Kg)</label>
                        <input type="text" class="form-control" name="weight" placeholder="Nhập cân nặng theo đơn vị Kg">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chiều cao (cm)</label>
                        <input type="text" class="form-control" name="height" placeholder="Nhập chiều cao theo đơn vị cm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nhận xét của bác sĩ</label>
                        <input type="text" class="form-control" name="comment" placeholder="Nhập nhận xét của bác sĩ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân loại dinh dưỡng</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            <option value="1">bình thường</option>
                            <option value="2">Suy dinh dưỡng</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
