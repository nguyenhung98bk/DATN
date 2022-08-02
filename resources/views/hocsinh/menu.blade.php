<div class="menu-top">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-1 doc">
            <p class="add"><i class="fas fa-map"></i> ADDRESS</p>
            <p class="diachi">Hưng Yên</p>
        </div>
        <div class="col-md-1 doc">
            <p class="add"><i class="fas fa-envelope-open"></i> EMAIL</p>
            <p class="diachi a">thao@gmail.com </p>
        </div>
        <div class="col-md-1 doc">
            <p class="add"><i class="fas fa-phone"></i> CONTACT</p>
            <p class="diachi">0967978353</p>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2 infor_user">
            @if(Auth::check() && Auth::user()->quyen==0)
                <img src="{{asset('imgs/demo/users/may-man.jpg') }}" alt="" width="35" height="35">
                {{Auth::user()->name}} <i class="fas fa-sort-down checklichsu"></i>
            @endif
            <div class="menunguoidung">
                <p><a href="{{url('hocsinh/lsthi')}}"><b>Lịch Sử Bài Thi</b> <i class="fas fa-chevron-right"></i></a></p>

            </div>
        </div>
        <div class="col-md-2">
            @if(Auth::check() && Auth::user()->quyen==0)
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <div class="login"><i class="fas fa-sign-out-alt"></i> Logout</div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{url('login')}}">
                    <div class="login "><i class="fas fa-user"></i> Login</div>
                </a>
            @endif
        </div>
    </div>
</div>
<div class="menu-ngang">
    <div class="row" data-spy="affix" data-offset-top="85">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <a href="{{url('trangchu') }}">
                <img src="{{asset('imgs/logo.png') }}" alt="">
            </a>

        </div>
        <div class="col-md-9 ngang">
            <ul>
                <li><a href="{{url('hocsinh/trangchu') }}">TRANG CHỦ </a></li>
                <li><a href="{{url('hocsinh/baithi')}}">LỚP THI</a></li>
                <li><a href="{{url('hocsinh/lsthi')}}">LỊCH SỬ BÀI THI
                    </a></li>
                <li>
                    <div class="dropdown">

                        <a href="" class="dropdown-toggle" data-toggle="dropdown">TÀI LIỆU </a>
                        <span class="caret"></span>
                        <ul class="dropdown-menu down_menu">
                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Ngoại Ngữ</span> <i
                                        class="fas fa-angle-right ic6"> </i></a>
                            </li>
                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Toán</span> <i
                                        class="fas fa-angle-right ic4"></i></a>
                            </li>
                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Ngữ Văn </span><i
                                        class="fas fa-angle-right ic5"> </i></a>
                            </li>


                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Sinh Học</span> <i
                                        class="fas fa-angle-right ic7"> </i></a>
                            </li>
                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Hóa Học</span> <i
                                        class="fas fa-angle-right ic7"> </i></a>
                            </li>
                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Vật Lý</span> <i
                                        class="fas fa-angle-right ic7"> </i></a>
                            </li>
                            <li>
                                <a href="{{url('ngoaingu')}}"><span>Môn Tin Học</span> <i
                                        class="fas fa-angle-right ic7"> </i></a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li><a href="{{url('tintuc')}}">TIN TỨC </a></li>
                <li><a href="{{url('lienhe')}}">LIÊN HỆ </a></li>
                <!-- <li><input type="text" class="timkiem" placeholder="  Tìm kiếm"> <i class="fas fa-search"></i></li> -->
                <li>
                    <form method="get" id="searchform" action="search">
                        <div class="email-box">
                            <i class="fas fa-search"></i>
                            <input type="text" class="tbox" name="key" placeholder="  Nhập từ khóa tìm kiếm">
                            <input type="submit" value="Tìm kiếm" class="btntk">

                        </div>
                    </form>
                </li>

            </ul>
        </div>

        <div class="col-md-1 ngang"></div>
    </div>
    <span id="scrolltopbtn" class="gotop"><i class="fas fa-arrow-up"></i></span>
</div>
<style>

    .gotop {
        margin-top: 600px;
        position: fixed;
        padding: 6px 13px 6px 13px;
        color: #fff;
        background: #4A9FF5;
    }

    .gotop:hover {
        color: #fff;
        background: #4A9FF5;
    }

    .infor_user {
        color: #fff;
        margin-top: 20px;
        text-align: right;
    }

    .infor_user img {
        border-radius: 50%;
    }

    .menunguoidung {
        background: #ffb606;
        color: #000;
        width: 150px;
        height: 50px;
        position: fixed;
        margin-left: 90px;
        margin-top: 15px;
        top: 1;
        z-index: 1;
        text-align: center;
        line-height: 50px;
        border: 1px solid #9C9A9A;
        display: none;
    }

    .menunguoidung a {
        color: #000;

    }

</style>
<script type="text/javascript">

    $(document).ready(function () {
        var state = 0;
        $(".checklichsu").click(function () {
            if (state == 0) {
                $(".menunguoidung").css("display", "block");
                state = 1;
            } else if (state == 1) {
                $(".menunguoidung").css("display", "none");
                state = 0;
            }
        })
    })

    $('#scrolltopbtn').click(function () {
        $('html,body').animate({scrollTop: 600}, 2000)
    });
</script>
