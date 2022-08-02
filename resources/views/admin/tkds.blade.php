@extends('layouts.admin')
@section('title','Thống kê điểm số')
@section('main')
    <div id="container" style="width: 1000px; height: 600px;margin: 0 auto;padding-top: 30px; padding-bottom: 100px;"></div>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu Đồ Thống Kê'
            },
            subtitle: {
                text: 'Lượt thống kê mới nhất'
            },
            xAxis: {
                categories: [
                    @foreach($mh as $value)
                    '{{$value->tenmonhoc}}',
                    @endforeach
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Thí sinh'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} hs</b></td></tr>',
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
                name: 'Điểm Liệt',
                data: [
                    @foreach($diem["liet"] as $value)
                    {{$value}},
                    @endforeach
                ]
            }, {
                name: 'Điểm TB',
                data: [@foreach($diem["tb"] as $value)
                        {{$value}},
                        @endforeach]
            }, {
                name: 'Điểm Khá',
                data: [@foreach($diem["kha"] as $value)
                {{$value}},
                @endforeach]
            }, {
                name: 'Điểm Giỏi',
                data: [@foreach($diem["gioi"] as $value)
                    {{$value}},
                    @endforeach]
            }]
        });
    </script>
@stop
