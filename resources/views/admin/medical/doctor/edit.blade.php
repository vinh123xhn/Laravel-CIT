@extends('layout.master')
@section('title')
    doctor
@endsection
@section('medical', 'active')
@section('doctor', 'active')
@section('medical-open', 'menu-open')
@section('content_header_name')
    Sửa thông tin nhân viên y tế
@endsection
@section('content_header_active')
    Sửa thông tin nhân viên y tế
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin nhân viên y tế</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.doctor.form.update', $doctor->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" value="{{old('name') ? old('name') : $doctor->name}}">
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cơ sở y tế</label>
                        <select class="form-control select2" name="hospital_id" style="width: 100%;">
                            @foreach($hospitals as $k => $item)
                                <option
                                @if($doctor->hospital_id == $k)
                                    {{"selected"}}
                                @endif
                                value="{{$k}}">{{$item}}
                                </option>
                            @endforeach
                        </select>
                        @error('hospital_id')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Công việc</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            @foreach (config('base.type_of_doctor') as $k => $item)
                                <option
                                    @if($doctor->type == $k)
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
                        <label for="exampleInputPassword1">Ngày sinh</label>
                        <input type="text" class="form-control" name="birthday" placeholder="Nhập ngày sinh" value="{{ old('birthday') ? old('birthday') : $doctor->birthday}}">
                        @error('birthday')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address') ? old('address') : $doctor->address}}">
                        @error('address')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập mã số điện thoại" value="{{old('phone') ? old('phone') : $doctor->phone}}">
                        @error('phone')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trình độ</label>
                        <input type="text" class="form-control" name="degree" placeholder="Nhập trình độ/ bằng cấp" value="{{old('degree') ? old('degree') : $doctor->degree}}">
                        @error('degree')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chức vụ</label>
                        <input type="text" class="form-control" name="position" placeholder="Nhập chức vụ" value="{{old('position') ? old('position') : $doctor->position}}">
                        @error('position')
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
