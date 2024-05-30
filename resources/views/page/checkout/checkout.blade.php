@extends('layout.site')
@section('main')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">check</li>
        </ol>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2>check out</h2>
    
        <div class="login-form-grids animated wow slideInUp" data-wow-delay="">
            <form action="{{url('/luu_checkout')}}" method="GET">
                @csrf 
                <input type="text" name="shipping_name" placeholder="tên" required=" " >
                <input type="text"name="shipping_email" placeholder="email" required=" " >
                <input type="text" name="shipping_phone" placeholder="phone" required=" " >
                <input type="text"name="shipping_address" placeholder="address" required=" " >
               
                <input type="submit" name="order" value="gửi đi">
            </form>
        </div>
    </div>

</div>
@stop