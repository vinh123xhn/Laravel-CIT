@extends('layout.master')
@section('title')
    commune
@endsection
@section('district', 'active')
@section('redirect_to_list')
    <a href="{{route('admin.commune.list', ['district_id' => $district_id])}}">
        Danh sách phường xã
    </a>
@endsection
@section('content_header_name')
    Sửa thông tin phường xã
@endsection
@section('content_header_active')
    Sửa thông tin phường xã
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin phường xã</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.commune.form.update', ['id' => $commune->id, 'district_id' => $district_id])}}">
                @csrf
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên phường xã</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên phường xã" value="{{old('name') ? old('name') : $commune->name}}">
                            @error('name')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.commune.list', ['district_id' => $district_id])}}">quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
