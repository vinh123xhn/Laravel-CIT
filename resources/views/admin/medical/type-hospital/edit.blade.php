@extends('layout.master')
@section('title')
    hospital
@endsection
@section('content_header_name')
    Tạo mới loại cơ sở y tế
@endsection
@section('medical', 'active')
@section('medical-open', 'menu-open')
@section('type-hospital', 'active')
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
            <form role="form" method="post" action="{{route('admin.type-hospital.form.update', $type->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên loại cơ sở</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên phân loại cơ sở y tế" value="{{old('name') ? old('name') : $type->name}}">
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân loại</label>
                        <select class="form-control select2" name="type" style="width: 100%;">
                            @foreach (config('base.type_of_hospital') as $k => $item)
                                <option
                                    @if($type->type == $k)
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
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
