<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thi Trực Tuyến</title>
    <link rel="stylesheet" href="{{ url('css/trangdangnhap.css')}}">
</head>
<body>
<div style="color: #fff">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-area">
            <div class="img-area">
                <img src="imgs/login-icon.png" alt="">
            </div>
            <h2>Đăng Nhập</h2>
            <p>Email: </p>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}"
                   required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <p>Mật khẩu: </p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required
                   autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <button type="submit" class="btnlogin">
                <span class="btn-text"> Log in</span>
            </button>
        </div>
    </form>
</div>
</body>
