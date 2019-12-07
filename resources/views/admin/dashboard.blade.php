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
        <div class="col-lg-6">
            <div class="card">
                <div id="school" style="min-width: 500px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div id="teacher" style="min-width: 500px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div id="student" style="min-width: 500px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script>
        $.get('/ajax-get-school', function (data) {
            Highcharts.chart('school', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Thống kê cơ sở giáo dục toàn tỉnh'
                },
                subtitle: {
                    text: 'Đơn vị: trường'
                },
                xAxis: {
                    categories: data['district'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Đơn vị: (trường)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:1f} trường</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Mầm non',
                    data: data['nursery']

                }, {
                    name: 'Tiểu học',
                    data: data['primary']

                }, {
                    name: 'THCS',
                    data: data['junior_high']

                }, {
                    name: 'THPT',
                    data: data['high']

                }, {
                    name: 'Tiểu học/ THCS',
                    data: data['primary_junior_high']

                }, {
                    name: 'THCS/ THPT',
                    data: data['junior_and_high']

                }, {
                    name: 'Giáo dục thường xuyên',
                    data: data['cec']

                }]
            });
        })
        $.get('/ajax-get-teacher', function (data) {
            Highcharts.chart('teacher', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Thông kê nhân viên giáo dục toàn tỉnh'
                },
                subtitle: {
                    text: 'Đơn vị: người'
                },
                xAxis: {
                    categories: data['district'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Đơn vị: (người)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:1f} người</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Cán bộ quản lý',
                    data: data['manager']

                }, {
                    name: 'Giáo viên',
                    data: data['teacher']

                }, {
                    name: 'Nhân viên',
                    data: data['employee']

                }]
            });
        })
        $.get('/ajax-get-student', function (data) {
            Highcharts.chart('student', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Thống kê học sinh toàn tỉnh'
                },
                subtitle: {
                    text: 'Đơn vị: người'
                },
                xAxis: {
                    categories: data['district'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Đơn vị: (người)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:1f} người</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Mầm non',
                    data: data['nursery']

                }, {
                    name: 'Tiểu học',
                    data: data['primary']

                }, {
                    name: 'THCS',
                    data: data['junior_high']

                }, {
                    name: 'THPT',
                    data: data['high']

                }, {
                    name: 'Tiểu học/ THCS',
                    data: data['primary_junior_high']

                }, {
                    name: 'THCS/ THPT',
                    data: data['junior_and_high']

                }, {
                    name: 'Giáo dục thường xuyên',
                    data: data['cec']

                }]
            });
        })
    </script>
@endsection
