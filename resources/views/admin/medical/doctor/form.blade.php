@extends('layout.master')
@section('title')
    doctor
@endsection
@section('content_header_name')
    Tạo mới nhân viên y tế
@endsection
@section('content_header_active')
    Tạo mới nhân viên y tế
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
            <form role="form" method="post" action="{{route('admin.doctor.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cơ sở y tế</label>
                        <select class="form-control select2" name="hospital_id" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            @foreach($hospitals as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Công việc</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            <option value="1">Bác sĩ</option>
                            <option value="2">Dược sĩ</option>
                            <option value="3">Điều dưỡng</option>
                            <option value="4">Nữ hộ sinh</option>
                        </select>
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
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập mã số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trình độ</label>
                        <input type="text" class="form-control" name="degree" placeholder="Nhập trình độ/ bằng cấp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chức vụ</label>
                        <input type="text" class="form-control" name="position" placeholder="Nhập chức vụ">
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
