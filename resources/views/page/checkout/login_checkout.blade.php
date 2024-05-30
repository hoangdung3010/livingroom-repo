@extends('layout.site')
@section('main')


<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Trang đăng nhập</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- login -->
<div class="login">
    <div class="container">
        <h2>Trang đăng nhập</h2>

        <div class="login-form-grids animated wow slideInUp">
            <form action="{{url('/login_khachhang')}}" method="GET">
                {{ csrf_field() }}
                <input type="email" placeholder="Email Address" name="customer_email" required=" " >
                <input type="text" placeholder="Password" name="customer_pass" required=" " >
                <div class="forgot">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <input type="submit" value="Login">

            </form>
        </div>

        <h4>Dành cho người mới</h4>
        <p><a href="">Đăng ký tại đây</a> (Or) quay lại <a href="index.html">Trang chủ<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>



        <div class="register">
            <div class="container">
                <h2>Đăng ký tại đây</h2>
                <div class="login-form-grids">
                    <h5>Thông tin cá nhân</h5>

                    <h6>Thông tin đăng nhập</h6>
                        <form action="{{url('/add-khachhang')}}" method="get">
                            @csrf
                        <input type="text" name="customer_name" placeholder="" required=" " >
                        <input type="email" name="customer_email" placeholder="Email Address" required=" " >
                        <input type="text" name="customer_pass" placeholder="Password" required=" " >
                        <input type="text" name="customer_phone" placeholder="điện thoại" required=" " >
                        <div class="register-check-box">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Tôi đồng ý các điều khoản</label>
                            </div>
                        </div>
                        <input type="submit" value="Đăng ký">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
