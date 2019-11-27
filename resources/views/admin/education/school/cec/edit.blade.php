@extends('layout.master')
@section('title')
    cen school
@endsection
@section('school', 'active')
@section('cen_school', 'active')
@section('school-open', 'menu-open')
@section('content_header_name')
    Tạo mới trung tâm giáo dục thường xuyên
@endsection
@section('content_header_active')
    Tạo mới trung tâm giáo dục thường xuyên
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới trung tâm giáo dục thường xuyên</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.school.cec.form.update', $school->id)}}">
                @csrf
                <div class="card-body">
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên cơ sở</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên cơ sở y tế" value="{{old('name') ? old('name') : $school->name}}">
                            @error('name')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
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
                    </div>
                    <div class="col-md-6 float-left">
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
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address') ? old('address') : $school->address}}">
                            @error('address')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" placeholder="Nhập mã giới thiệu" value="{{old('phone') ? old('phone') : $school->phone}}">
                            @error('phone')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{old('email') ? old('email') : $school->email}}">
                            @error('email')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Website</label>
                            <input type="text" class="form-control" name="website" placeholder="Nhập tên website" value="{{old('website') ? old('website') : $school->website}}">
                            @error('website')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Diện tích (m2)</label>
                            <input type="text" class="form-control" name="acreage" placeholder="Nhập diện tích trường" value="{{old('acreage') ? old('acreage') : $school->acreage}}">
                            @error('acreage')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên hiệu trưởng</label>
                            <input type="text" class="form-control" name="name_of_principal" placeholder="Nhập tên hiệu trưởng" value="{{old('name_of_principal') ? old('name_of_principal') : $school->name_of_principal}}">
                            @error('name_of_principal')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp học</label>
                            <input type="text" class="form-control" name="total_of_class" placeholder="Nhập tổng số lớp" value="{{old('total_of_class') ? old('total_of_class') : $data->total_of_class}}">
                            @error('total_of_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp xóa mù chữ</label>
                            <input type="text" class="form-control" name="total_of_xmc" placeholder="Nhập tổng số lớp xóa mù chữ" value="{{old('total_of_xmc') ? old('total_of_xmc') : $data->total_of_xmc}}">
                            @error('total_of_xmc')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp giáo dục tiếp tục sau khi biết chữ</label>
                            <input type="text" class="form-control" name="total_of_gdttskbc" placeholder="Nhập tổng số lớp giáo dục tiếp tục sau khi biết chữ" value="{{old('total_of_gdttskbc') ? old('total_of_gdttskbc') : $data->total_of_class}}">
                            @error('total_of_gdttskbc')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 6</label>
                            <input type="text" class="form-control" name="total_of_6" placeholder="Nhập tổng số lớp 6" value="{{old('total_of_6') ? old('total_of_6') : $data->total_of_6}}">
                            @error('total_of_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 7</label>
                            <input type="text" class="form-control" name="total_of_7" placeholder="Nhập tổng số lớp 7" value="{{old('total_of_7') ? old('total_of_7') : $data->total_of_7}}">
                            @error('total_of_7')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 8</label>
                            <input type="text" class="form-control" name="total_of_8" placeholder="Nhập tổng số lớp 8" value="{{old('total_of_8') ? old('total_of_8') : $data->total_of_8}}">
                            @error('total_of_8')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 9</label>
                            <input type="text" class="form-control" name="total_of_9" placeholder="Nhập tổng số lớp 9" value="{{old('total_of_9') ? old('total_of_9') : $data->total_of_9}}">
                            @error('total_of_9')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 10</label>
                            <input type="text" class="form-control" name="total_of_10" placeholder="Nhập tổng số lớp 10" value="{{old('total_of_10') ? old('total_of_10') : $data->total_of_10}}">
                            @error('total_of_10')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 11</label>
                            <input type="text" class="form-control" name="total_of_11" placeholder="Nhập tổng số lớp 11" value="{{old('total_of_11') ? old('total_of_11') : $data->total_of_11}}">
                            @error('total_of_11')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 12</label>
                            <input type="text" class="form-control" name="total_of_12" placeholder="Nhập tổng số lớp 12" value="{{old('total_of_12') ? old('total_of_12') : $data->total_of_12}}">
                            @error('total_of_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học</label>
                            <input type="text" class="form-control" name="total_classroom" placeholder="Nhập tổng số phòng học" value="{{old('total_classroom') ? old('total_classroom') : $data->total_classroom}}">
                            @error('total_classroom')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng bộ môn</label>
                            <input type="text" class="form-control" name="total_subject_room" placeholder="Nhập tổng số phòng học bộ môn" value="{{old('total_subject_room') ? old('total_subject_room') : $data->total_subject_room}}">
                            @error('total_subject_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng chức năng</label>
                            <input type="text" class="form-control" name="total_function_room" placeholder="Nhập tổng số phòng chức năng" value="{{old('total_function_room') ? old('total_function_room') : $data->total_function_room}}">
                            @error('total_function_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
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
