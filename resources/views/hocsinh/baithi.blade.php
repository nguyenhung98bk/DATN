@extends('layouts.hocsinh');
@section('body')
    <div class="container thiTHPTQG">
        <div class="row main_test">
            <div class="col-md-12">
                <div class="col-md-12 tieudetintuc">
                    <h3>Lớp thi của bạn</h3>
                </div>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="row hinhanh">
                            @foreach($baithi as $key => $value)
                                <a href="{{url('hocsinh/chuanbi',$value->id_lopthi)}}" style="color: black;">
                                    <div class="col-md-3 dethi " style="background-color: pink;" >
                                        <p class="tenmon">{{$value->tenlop}}</p>
                                        <p class="title">Thời gian có thể làm bài:<br>Từ: {{$value->thoigianbd}} <br>Đến: {{$value->thoigiankt}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
