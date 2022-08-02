@extends('layouts.hocsinh')
@section('body')
    <div class="start" id="start" style="min-height: 500px;">
        <div>
            <button class="btn btn-primary" onclick="start2('{{$time_end}}')">
                @if($check == 1)
                    Tiếp tục
                @else
                    Bắt đầu
                @endif
            </button>
        </div>
    </div>
    <div class="container" id="main" style="display: none">
        <div class="row">
            <div class="clock"
                 style="float: right; background-color: pink; border-bottom-left-radius: 20%; border-top-left-radius: 20%; border-bottom-right-radius: 20%; border-top-right-radius: 20%;">
                <h3 style="margin: 20px;">
                    <span id="h"></span>:
                    <span id="m"></span>:
                    <span id="s"></span>
                </h3>
            </div>
        </div>
        <?php $i = -1; $demch = 1; $demda = 65; ?>
        <table class="table table-bordered">
            @foreach($ctbt as $key => $value)
                @if($value->id_cauhoi != $i)
                    <tr>
                        <th><label class=""> Câu hỏi {{$demch}}: {{$value->ndch}}</label><br></th>
                    </tr>
                    <?php $i = $value->id_cauhoi;$demch++;$demda = 65; ?>
                @endif
                @if($value->id_dapan==$value->dapanhs)
                    <td><input type="radio" name="dapancau[{{$demch}}]" class="form-control-sm" checked
                               onclick="updatedapan('{{$value->id_ctbt}}','{{$value->id_cauhoi}}','{{$value->id_dapan}}');"> {{chr($demda)}}
                        : {{$value->ndda}}<br></td>
                @else
                    <td><input type="radio" name="dapancau[{{$demch}}]" class="form-control-sm"
                               onclick="updatedapan('{{$value->id_ctbt}}','{{$value->id_cauhoi}}','{{$value->id_dapan}}');"> {{chr($demda)}}
                        : {{$value->ndda}}<br></td>
                    @endif
                    </tr>
                    <?php $demda++ ?>
                    @endforeach
                    <tr>
                        <td class="style_row tbl-row" colspan="2">
                            <a href="{{url('hocsinh/nopbai/'.$id)}}" id="myCheck">
                                <button type="submit" class="btn  btn-primary">Nộp bài</button>
                            </a>
                        </td>
                    </tr>
        </table>
    </div>
@stop
<script>
    function updatedapan(id_ctbt, id_cauhoi, id_dapan) {
        $.ajax({
            type: "POST",
            url: '/hocsinh/updatedapan',
            data: {
                id_ctbt: id_ctbt,
                id_cauhoi: id_cauhoi,
                id_dapan: id_dapan,
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                //
            },
            error: function (data, textStatus, errorThrown) {
                //
            },
        });
    }

    var h;
    var m;
    var s;
    var timeout = null;
    var time_end_local;

    function stop() {
        clearTimeout(timeout);
    }
    function tachstring(time) {
        var d1 = time.slice(8,10);
        var h1 = time.slice(11,13);
        var m1 = time.slice(14,16);
        var s1 = time.slice(17,19);
        var today = new Date();
        var d2 = today.getDate()
        var h2 = today.getHours();
        var m2 = today.getMinutes();
        var s2 = today.getSeconds();
        s = (((d1-d2)*24+(h1-h2))*60+(m1-m2))*60+(s1-s2);
        h = Math.floor(s/3600);
        m = Math.floor(s/60)-h*60;
        s = s - h*3600 - m*60;
    }
    function start2 (time_end) {
        document.getElementById ("start").style.display = 'none';
        document.getElementById("main").style.display = 'block';
        tachstring(time_end);
        start();
    }
    function start() {
        if(h<0){
            document.getElementById("myCheck").click();
        }
        if (s === -1) {
            m -= 1;
            s = 59;
        }
        if (m === -1) {
            h -= 1;
            m = 59;
        }
        if (h == -1) {
            clearTimeout(timeout);
            alert('Hết giờ');
            return false;
        }
        document.getElementById('h').innerText = h.toString();
        document.getElementById('m').innerText = m.toString();
        document.getElementById('s').innerText = s.toString();

        timeout = setTimeout(function () {
            s--;
            start();
        }, 1000);
    };
</script>
