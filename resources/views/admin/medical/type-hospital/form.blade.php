@extends('layout.master')
@section('title')
    hospital
@endsection
@section('content_header_name')
    Tạo mới loại cơ sở y tế
@endsection
@section('content_header_active')
    Tạo mới Loại cơ sở y tế
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới loại cơ sở y tế</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.type-hospital.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên loại cơ sở</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên phân loại cơ sở y tế">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân loại</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            <option value="1">Bệnh viện</option>
                            <option value="2">Cơ sở y tế</option>
                        </select>
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
