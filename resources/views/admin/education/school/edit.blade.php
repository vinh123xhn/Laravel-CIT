@extends('layout.master')
@section('title')
    hospital
@endsection
@section('education', 'active')
@section('school', 'active')
@section('education', 'menu-open')
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
            <form role="form" method="post" action="{{route('admin.school.form.update', $school->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên cơ sở</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên cơ sở y tế" value="{{old('name') ? old('name') : $school->name}}">
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại trường học</label>
                        <select class="form-control select2" name="type_of_school" style="width: 100%;">
                            @foreach(config('base.type_of_school') as $k => $item)
                                <option
                                    @if($school->type_of_school == $k)
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
                        <label for="exampleInputPassword1">Quận/ huyện</label>
                        <select class="form-control select2" name="district_id" id="district" style="width: 100%;">
                            @foreach($districts as $k => $item)
                                <option
                                    @if($school->district_id == $k)
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
                        <label for="exampleInputPassword1">Phường/ xã</label>
                        <select class="form-control select2" name="commune_id" id="commune" style="width: 100%;">
                            @foreach($communes as $k => $item)
                                <option
                                    @if($school->commune_id == $k)
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
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address') ? old('address') : $school->address}}">
                        @error('address')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập mã giới thiệu" value="{{old('phone') ? old('phone') : $school->phone}}">
                        @error('phone')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{old('email') ? old('email') : $school->email}}">
                        @error('email')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Website</label>
                        <input type="text" class="form-control" name="website" placeholder="Nhập tên website" value="{{old('website') ? old('website') : $school->website}}">
                        @error('website')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Diện tích (m2)</label>
                        <input type="text" class="form-control" name="acreage" placeholder="Nhập diện tích trường" value="{{old('acreage') ? old('acreage') : $school->acreage}}">
                        @error('acreage')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tên hiệu trưởng</label>
                        <input type="text" class="form-control" name="name_of_principal" placeholder="Nhập tên hiệu trưởng" value="{{old('name_of_principal') ? old('name_of_principal') : $school->name_of_principal}}">
                        @error('name_of_principal')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tổng số phòng học</label>
                        <input type="text" class="form-control" name="total_classroom" placeholder="Nhập tổng số phòng học" value="{{old('total_classroom') ? old('total_classroom') : $school->total_classroom}}">
                        @error('total_classroom')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tổng số phòng chức năng</label>
                        <input type="text" class="form-control" name="total_function_room" placeholder="Nhập tổng số phòng chức năng" value="{{old('total_function_room') ? old('total_function_room') : $school->total_function_room}}">
                        @error('total_function_room')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tổng số phòng bộ môn</label>
                        <input type="text" class="form-control" name="total_subject_room" placeholder="Nhập tổng số phòng bộ môn" value="{{old('total_subject_room') ? old('total_subject_room') : $school->total_subject_room}}">
                        @error('total_subject_room')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tổng số trang thiết bị tối thiểu đầy đủ</label>
                        <input type="text" class="form-control" name="total_device_full" placeholder="Nhập tổng số trang thiết bị tối thiểu đầy đủ" value="{{old('total_device_full') ? old('total_device_full') : $school->total_device_full}}">
                        @error('total_device_full')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tổng số trang thiết bị tối thiểu không đầy đủ</label>
                        <input type="text" class="form-control" name="total_device_not_full" placeholder="Nhập tổng số trang thiết bị tối thiểu không đầy đủ" value="{{old('total_device_not_full') ? old('total_device_not_full') : $school->total_device_not_full}}">
                        @error('total_device_not_full')
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
@section('js')
    <script>
        $('#district').on('change', function (e) {
            console.log(e);

            var cat_id = e.target.value;

            $.get('/ajax-get-commune?cat_id=' + cat_id, function (data) {
                $('#commune').empty();
                $.each(data, function (index, commune) {
                    $('#commune').append('<option value="'+commune.id+'">'+commune.name+'</option>');
                })
            })
        });
    </script>
@endsection
