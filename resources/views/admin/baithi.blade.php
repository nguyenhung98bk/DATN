@extends('layouts.admin')
@section('title','Quản lý bài thi')
@section('main')
    @if(isset($baithi))
    <table class="table table-bordered">
        <tr class="tbl">
            <td class="style_row" style="width: 20%">Họ và tên</td>
            <td>{{$baithi->ten}}</td>
        </tr>
        <tr class="tbl">
            <td class="style_row">Thời gian bắt đầu làm bài</td>
            <td>{{$baithi->thoigianbd}}</td>
        </tr>
        <tr class="tbl">
            <td class="style_row">Thời gian nộp bài</td>
            <td>{{$baithi->thoigiankt}}</td>
        </tr>
        <tr class="tbl">
            <td class="style_row">Số câu đúng / Tổng số câu</td>
            <td>{{$baithi->socaudung}}/{{$socau}}</td>
        </tr>
        <tr class="tbl">
            <td class="style_row">Điểm</td>
            <td>{{$baithi->diem}}</td>
        </tr>
        <tr>
            <td class="style_row tbl-row" colspan="2">
                <a href="{{url('admin/xemchitiet/'.$baithi->id)}}"><button type="button" class="btn  btnsuach">Xem chi tiết</button></a>
                <a href="{{url('admin/taodanhsachthi/'.$id_lopthi)}}"><button type="button" class="btn  btnxoach">Thoát</button></a>
            </td>
        </tr>
    </table>
    @endif
    <div class="container">
        <div class="form-group" style="text-align: center; text-align-all: center">
            <div style=" width: 300px; height: 200px; margin-left: 25%; margin-top: 10%;">
                <h3>Học sinh chưa làm bài thi</h3>
            </div>
        </div>
    </div>
@stop
