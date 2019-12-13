@extends('layout.master')
@section('title')
    Trang chủ
@endsection
@section('content_header_name')
    Trang chủ
@endsection
@section('content_header_active')
    Trang chủ
@endsection
@section('content')
{{--    <input type="hidden" id="district" value="{{$data}}">--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div id="school" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div id="school2" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div id="teacher" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div id="teacher2" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div id="student" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script src="{{asset('js/school.js')}}"></script>
    <script src="{{asset('js/teacher.js')}}"></script>
    <script src="{{asset('js/student.js')}}"></script>
@endsection
