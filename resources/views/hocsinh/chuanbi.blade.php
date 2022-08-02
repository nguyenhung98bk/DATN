@extends('layouts.hocsinh')
@section('body')
    <div class="container" id="main">
        <div class="row giohang">
            <div class="col-md-5 ">
                <h3 class="thongtinctde" style="text-transform: uppercase;"><b>ĐỀ THI
                        MÔN {{mb_strtoupper($baithi->tenlop)}}</b></h3>
                @if(session('errors'))
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-remove-circle"></span> {{session('errors')}}
                    </div>
                @endif
                <p><b>Số câu:</b> {{ $baithi->socaude+$baithi->socautb+$baithi->socaukho}} câu</p>
                <p><b>Thời gian thi làm bài:</b> {{$baithi->thoigian}} phút</p>
                <p><b>Thời gian có thể bắt đầu làm bài:</b> {{ $baithi->thoigianbd}}</p>
                <p><b>Thời gian có thể kết thúc bài thi:</b> {{ $baithi->thoigiankt}}</p>
                <p class="note"><b>Chú ý khi tham gia</b></p>
                <p><span class="glyphicon glyphicon-ok"></span> &nbsp;Hệ thống bắt đầu tính giờ làm bài thi</p>
                <p class="review">
                    <span class="glyphicon glyphicon-ok"> </span> Phải chọn đáp án trả lời để tiếp tục bài thi
                </p>
                <p class="review">
                    <span class="glyphicon glyphicon-ok"> </span> Hệ thống tự động kết thúc bài, tính điểm khi hết
                    giờ làm bài
                </p>
                <p class="review">
                    <span class="glyphicon glyphicon-ok"> </span> Xem lịch sử bài thi
                </p>
                @if(Auth::check())
                    <a href="{{url('hocsinh/batdau/'.$baithi->id)}}">
                        <button type="button" class="btn warning" id="giohang">THAM GIA NGAY</button>
                    </a>
                @endif

                <p>
                    <span class="f"><b><i class="fas fa-eye"></i></b> &nbsp;View: 217</span>
                    <span class="g"><b><i class="fas fa-clipboard-check"></i></b> &nbsp;Taken: 1200</span>
                    <span class="L"><b>20</b> &nbsp;votes</span>
                </p>
            </div>
        </div>
    </div>
@stop
