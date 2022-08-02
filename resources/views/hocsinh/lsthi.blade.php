@extends('layouts.hocsinh')
@section('body')
    <div class="container thiTHPTQG" >
        <div class="row main_test">
            <div class="col-md-12">
                <div class="col-md-12 tieudetintuc">
                    <h3>LỊCH SỬ BÀI THI</h3>
                </div>
                <div class="tab-content">
                    <table class="table tbl">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Lớp thi</th>
                            <th>Số câu đúng/Tổng số câu</th>
                            <th>Điểm</th>
                            <th>Thời gian làm bài</th>
                            <th>Thời gian nộp bài</th>
                            <th>Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($baithi as $key => $value)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$value->tenlop}}</td>
                                <td>{{$value->socaudung}}/{{$value->socaude+$value->socautb+$value->socaukho}}</td>
                                <td>{{$value->diem}}</td>
                                <td>{{$value->thoigianbd}}</td>
                                <td>{{$value->thoigiankt}}</td>
                                <td><a href="{{url('hocsinh/ketqua/'.$value->id)}}">
                                        <button class="btn btnsuach">Xem</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
