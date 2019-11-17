@extends('layout.master')
@section('title')
    children
@endsection
@section('medical', 'active')
@section('children', 'active')
@section('medical-open', 'menu-open')
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
                <h3 class="card-title">Tạo mới thông tin trẻ em</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="form" method="post" action="{{route('admin.children.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control name" placeholder="Nhập họ và tên" value="{{ old('name') }}">

                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ngày sinh</label>
                        <input type="text" class="form-control birthday" name="birthday" placeholder="Nhập ngày sinh" value="{{ old('birthday') }}">

                        @error('birthday')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control address" name="address" placeholder="Nhập địa chỉ" value="{{ old('address') }}">

                        @error('address')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cân nặng (Kg)</label>
                        <input type="text" class="form-control weight" name="weight" placeholder="Nhập cân nặng theo đơn vị Kg" value="{{ old('weight') }}">

                        @error('weight')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chiều cao (cm)</label>
                        <input type="text" class="form-control height" name="height" placeholder="Nhập chiều cao theo đơn vị cm" value="{{ old('height') }}">

                        @error('height')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nhận xét của bác sĩ</label>
                        <input type="text" class="form-control comment" name="comment" placeholder="Nhập nhận xét của bác sĩ" value="{{ old('comment') }}">

                        @error('comment')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân loại dinh dưỡng</label>
                        <select class="form-control select2 type" name="type" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            <option value="1">bình thường</option>
                            <option value="2">Suy dinh dưỡng</option>
                        </select>

                        @error('type')
                        <div class="danger">{{ $message }}</div>
                        @enderror
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
