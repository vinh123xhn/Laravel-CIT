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
@section('css')
    <script src="{{asset('highchart/code/highcharts.js')}}"></script>
    <script src="{{asset('highchart/code/modules/exporting.js')}}"></script>
    <script src="{{asset('highchart/code/modules/export-data.js')}}"></script>
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
        <div class="col-md-12">
            <div class="card">
                <div id="teacher3" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div id="student" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div id="student2" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        Highcharts.setOptions( {
            lang: {
                downloadCSV:"Tải xuống CSV",
                downloadJPEG:"Tải xuống JPEG",
                downloadPDF:"Tải xuống PDF",
                downloadPNG:"Tải xuống PNG",
                downloadSVG:"Tải xuống SVG",
                downloadXLS:"Tải xuống XLS",
                viewData:"Xem bảng dữ liệu",
                viewFullscreen:"Xem toàn cảnh",
                printChart:"In biểu đồ",
                openInCloud:"Xem trên Highchart đám mây",
            }
        });
    </script>
    <script src="{{asset('js/school.js')}}"></script>
    <script src="{{asset('js/teacher.js')}}"></script>
    <script src="{{asset('js/student.js')}}"></script>
@endsection
