@extends('layout.site')
@section('main')
<div class="login">
    <div class="container">
        <h2>Login Form</h2>
    
        <div class="login-form-grids animated wow slideInUp">
            <form action="{{url('/khachhangdangnhap')}}" method="GET">
                {{ csrf_field() }}
                <input type="email" placeholder="Email Address" name="customer_email" required=" " >
                <input type="text" placeholder="Password" name="customer_pass" required=" " >
                <div class="forgot">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" value="Login">
               
            </form>
        </div>
        
       

        
       
    </div>
</div>
@stop