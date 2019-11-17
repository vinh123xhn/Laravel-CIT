@extends('layout.master')
@section('title')
    children
@endsection
@section('medical', 'active')
@section('children', 'active')
@section('medical-open', 'menu-open')
@section('content_header_name')
    Sửa thông tin trẻ em
@endsection
@section('content_header_active')
    Sửa thông tin trẻ em
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin trẻ em</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.children.form.update', $children->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" value="{{old('name') ? old('name') : $children->name}}">

                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ngày sinh</label>
                        <input type="text" class="form-control" name="birthday" placeholder="Nhập ngày sinh" value="{{old('birthday') ? old('birthday') : $children->birthday}}">

                        @error('birthday')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address') ? old('address') : $children->address}}">

                        @error('address')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cân nặng (Kg)</label>
                        <input type="text" class="form-control" name="weight" placeholder="Nhập cân nặng theo đơn vị Kg" value="{{old('weight') ? old('weight') : $children->weight}}">

                        @error('weight')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chiều cao (cm)</label>
                        <input type="text" class="form-control" name="height" placeholder="Nhập chiều cao theo đơn vị cm" value="{{old('height') ? old('height') : $children->height}}">

                        @error('height')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nhận xét của bác sĩ</label>
                        <input type="text" class="form-control" name="comment" placeholder="Nhập nhận xét của bác sĩ" value="{{old('comment') ? old('comment') : $children->comment}}">

                        @error('comment')
                        <div class="danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân loại dinh dưỡng</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            @foreach (config('base.type_of_children') as $k => $item)
                                <option
                                    @if($children->id == $k)
                                    {{"selected"}}
                                    @endif
                                    value="{{$k}}">{{$item}}
                                </option>
                            @endforeach
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
