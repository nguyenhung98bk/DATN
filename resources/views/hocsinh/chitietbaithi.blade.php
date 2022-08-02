@extends('layouts.hocsinh')
@section('body')
    <div class="container" id="main">
        <?php $i = -1; $demch = 1; $demda = 65; ?>
        <table class="table table-bordered">
            <tr>
                <span id="dapandung">A:</span> Nếu đáp án học sinh chọn là đúng
            </tr><br>
            <br>
            <tr>
                <span id="dapansai">A:</span> Nếu đáp án học sinh chọn là sai
            </tr><br>
            <br>
            @foreach($ctbt as $key => $value)
                @if($value->id_cauhoi != $i)
                    <tr>
                        <th><label class=""> Câu hỏi {{$demch}}: {{$value->ndch}}</label><br></th>
                    </tr>
                    <?php $i = $value->id_cauhoi;$demch++;$demda = 65; ?>
                @endif
                @if($value->id_dapan==$value->dapanhs)
                    @if($value->dads==0)
                        <td><span id="dapansai">{{chr($demda)}}:</span> {{$value->ndda}}</td>
                    @else
                        <td><span id="dapandung">{{chr($demda)}}:</span> {{$value->ndda}}</td>
                    @endif
                @else
                    <td></span> {{chr($demda)}}:</span> {{$value->ndda}}</td>
                    @endif
                    </tr>
                    <?php $demda++ ?>
                    @endforeach
        </table>
    </div>
    <style>
        #dapansai {
            border: 2px groove #b1154a;
            border-radius: 50%;
        }
        #dapandung {
            border: 2px groove greenyellow;
            border-radius: 50%;
        }
    </style>
@stop
