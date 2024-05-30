@php
	use App\Models\category;

@endphp
<!DOCTYPE html>
<html>
<head>
<title>ROYALTEA</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{url('public/site')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('public/site')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{url('public/site')}}/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{url('public/site')}}/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{url('public/site')}}/js/move-top.js"></script>
<script type="text/javascript" src="{{url('public/site')}}/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<?php

//echo Session::get('customer_id');
// //echo Session::get('shipping_id');
// //echo Session::get('customer_name');
// echo Session::get('customer_phone');
?>
</head>

<body>

<!-- header -->


	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">

                <p>Giảm giá và rất nhiều ưu đãi. <a href="">Chào mừng bạn đến với cửa hàng ROYALTEA!!!</a></p>
			</div>
			<div class="agile-login">
				<ul>
				<!--<li><a href="{url('/login_checkout')}}"> Tài khoản /login_checkout </a></li>-->
					<?php
						$kh=Session::get('customer_id');
						if($kh !=""){
					?>
					<li><a href="{{url('/logout_checkout')}}"> Đăng xuất </a></li>
					<?php
				         }
						 else {
					?>
					<li><a href="{{url('/khachhangdangnhap')}}">Đăng nhập</a></li>
					<?php
				         }
					?>
                    <?php
					$kh_id=Session::get('customer_id');
				   $content= Cart::content();
					if($kh_id != null || $content != null){
					?>
					<li><a href="{{url('/thanhtoan')}}"> Thanh toán </a></li>
					<?php
					}else {
					?>
					<li><a href="{{url('/logout_checkout')}}"> Thanh toán </a></li>
					<?php
					}
					?>
					<li><a href="">Help</a></li>


				</ul>
			</div>
			<div class=""id="load_cart">

					<form action="{{url('/show_cart')}}">
						@php


						@endphp


						<a href=""><button class="w3view-cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>{{ Cart::count()}}</button></a><p></p>
					</form>


					<!--{route('giohang.view')}-->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Mọi thắc mắc liên hệ : <span style="color: red">0393034189</span></li>

				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="{{route('home.index')}}"><img src="/doan101198/public/image/sach/logo.png" alt="" style="max-width:30%;"></a></h1>
			</div>
		<div class="w3l_search">
			<form action="{{url('/search_')}}" method="get">
				@csrf
				<input type="search" name="keyword_submit" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>

			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits"  style="background-color: ea4c89">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Chuyển đổi điều hướng thành</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{route('home.index')}}" class="act">Home</a></li>
									<!-- Mega Menu -->
									{{-- <li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Loại xe <b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Tất cả các loại</h6>
														@foreach ($ca as $item)

														   <li><a href="">{{$item->categoryname}}</a></li>
												        @endforeach
													</ul>
												</div>

											</div>
										</ul>
									</li> --}}
                                    <li><a href="{{url("/loaisp")}}">Loại sản phẩm</a></li>
									<li><a href="{{url("/gioithieu")}}">Giới thiệu</a></li>
									<li><a href="{{url("/tintuc")}}">Tin tức</a></li>
									<li><a href="{{url("/lienhe")}}">Liên hệ</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>

<!-- //navigation -->

		<!-- vị trí ở đây -->
       @yield('main')
	   <!-- vị trí ở đây -->



<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Liên hệ</h3>

					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Khoái Châu<span>Hưng yên.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="#">nguyendat@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>0965 557 149</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Thông tin về chúng tôi</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Thông tin về chúng tôi</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Liên hệ với chúng tôi</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">FAQ's</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Những sản phẩm đặc biệt</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Loại sản phẩm</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Tra Sữa</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Trà Chanh</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Cà Phê</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Đồ Ăn Vặt</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Thông tin cửa hàng</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Cửa hàng</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Giỏ hàng của tôi</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Đăng nhập</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Tạo tài khoản</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="footer-copy">

			<div class="container">
				<p>© 2021 ROYALTEA. Đăng ký bản quyền |Thiết kế bởi<a href="">Nguyễn Văn Đạt</a></p>
			</div>
		</div>

	</div>
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">
					<img src="{{url('public/site')}}/images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile" id="msg">

			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>

<script src="{{url('public/site')}}/js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{url('public/site')}}/js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="{{url('public/site')}}/js/skdslider.min.js"></script>
<link href="{{url('public/site')}}/css/skdslider.css" rel="stylesheet">

<!-- <script>
	function add_Cart(id){
		var cf = confirm("bạn muốn thêm sản phẩm này vào giỏ hàng");
		if(cf){
			$.ajax({
			url:'add_cart/'+id,
			type:'GET',

		}).done(function(Response){

			$('#msg').html(Response);

		});
		}

	}
</script>-->
<script>
	$('.btnclick').click(function(ev){
		ev.preventDefault();//không cho load lại trang
		var href=$(this).attr('href');

		$('form#formclick').attr('action',href);
		if(confirm("bạn có muốn thêm sản phẩm vào giỏ hàng ?")){
			$('form#formclick').submit();

		}
	})

	$('.btndelete').click(function(ev){
		ev.preventDefault();//không cho load lại trang
		var href=$(this).attr('href');

		$('form#formdelete').attr('action',href);
		if(confirm("bạn có muốn xóa sản phẩm trong giỏ hàng ?")){
			$('form#formdelete').submit();

		}
	})

</script>
<!-- //main slider-banner -->
</body>
</html>
