@extends('layout.site')
@section('main')

<div class="breadcrumbs">
    <div class="container">

        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">đặt hàng</li>
        </ol>
    </div>
</div>
<div class="checkout">
	<div class="container">
	   <h3 style="margin:20px;color:red">Cảm ơn bạn đã liên ở chỗ chúng tôi,chúng tôi sẽ liên hệ với bạn sớm nhất</h3>
		
		<div class="checkout-left">	
			
			<div class="checkout-right-basket">
				<a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Trở về trang chủ </a>
			</div>
			<div class="clearfix"> </div>
			
		</div>
	</div>
</div>

@stop