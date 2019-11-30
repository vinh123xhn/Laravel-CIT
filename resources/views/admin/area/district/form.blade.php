@extends('layout.master')
@section('title')
    district
@endsection
@section('content_header_name')
    Tạo mới quận huyện
@endsection
@section('content_header_active')
    Tạo mới quận huyện
@endsection
@section('redirect_to_list')
    <a href="{{route('admin.district.list')}}">
        Danh sách quận huyện
    </a>
@endsection
@section('district', 'active')
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới quận huyện</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.district.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên quận huyện</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên quận huyện" value="{{old('name')}}">
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.district.list')}}">quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
