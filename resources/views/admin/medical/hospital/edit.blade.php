@extends('layout.master')
@section('title')
    hospital
@endsection
@section('medical', 'active')
@section('hospital', 'active')
@section('medical-open', 'menu-open')
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
            <form role="form" method="post" action="{{route('admin.hospital.form.update', $hospital->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên cơ sở</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên cơ sở y tế" value="{{old('name') ? old('name') : $hospital->name}}">
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại cơ sở</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            @foreach($types as $k => $item)
                                <option
                                    @if($hospital->type == $k)
                                    {{"selected"}}
                                    @endif
                                    value="{{$k}}">{{$item}}
                                </option>
                            @endforeach
                        </select>
                        @error('type')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address') ? old('address') : $hospital->address}}">
                        @error('address')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập mã giới thiệu" value="{{old('phone') ? old('phone') : $hospital->phone}}">
                        @error('phone')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{old('email') ? old('email') : $hospital->email}}">
                        @error('email')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Website</label>
                        <input type="text" class="form-control" name="website" placeholder="Nhập tên website" value="{{old('website') ? old('website') : $hospital->website}}">
                        @error('website')
                        <p class="danger">{{ $message }}</p>
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
