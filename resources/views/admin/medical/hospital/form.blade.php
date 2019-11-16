@extends('layout.master')
@section('title')
    hospital
@endsection
@section('content_header_name')
    Tạo mới trung tâm y tế
@endsection
@section('content_header_active')
    Tạo mới trung tâm y tế
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới cơ sở y tế</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.hospital.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên cơ sở</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên cơ sở y tế">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại cơ sở</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            @foreach($types as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập mã giới thiệu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Website</label>
                        <input type="text" class="form-control" name="website" placeholder="Nhập tên website">
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
