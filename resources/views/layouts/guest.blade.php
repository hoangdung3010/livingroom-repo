

<!DOCTYPE html>
<html>
<head>
<title>BOOKSHOP</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartp
e Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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

echo Session::get('customer_id');
echo Session::get('shipping_id');
?>
</head>

<body>

<!-- header -->


	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="">SHOP NOW</a></p>
			</div>
			<div class="agile-login">
				<ul>
				<!--<li><a href="{url('/login_checkout')}}"> Tài khoản /login_checkout </a></li>-->
					<?php
						$kh_id=Session::get('customer_id');
						if($kh_id !=""){
					?>
					<li><a href="{{url('/logout_checkout')}}"> Đăng xuất </a></li>
					<?php
				         }
						 else {
					?>
					<li><a href="{{url('/login_khachhang')}}">Login</a></li>
					<?php
				         }
					?>

                    <?php
					$kh_id=Session::get('customer_id');
					if($kh_id !=null){


					?>
					<li><a href="{{url('/checkout')}}"> Thanh toán </a></li>
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



						<a href="{{route('giohang.view')}}"><button class="w3view-cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>{{$cart->total_quantity}}</button></a><p></p>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="{{route('home.index')}}"><img src="/project4v1/public/image/sach/lg1.png" alt="" style=""></a></h1>
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
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{route('home.index')}}" class="act">Home</a></li>
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Loại sách<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Groceries</h6>

														<li><a href="">Dals & Pulses</a></li>
														<li><a href="">Almonds</a></li>
														<li><a href="">Cashews</a></li>
														<li><a href="">Dry Fruit</a></li>
														<li><a href=""> Mukhwas </a></li>
														<li><a href="">Rice & Rice Products</a></li>
													</ul>
												</div>

											</div>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal Care<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Baby Care</h6>
														<li><a href="">Baby Soap</a></li>
														<li><a href="">Baby Care Accessories</a></li>
														<li><a href="">Baby Oil & Shampoos</a></li>
														<li><a href="">Baby Creams & Lotion</a></li>
														<li><a href=""> Baby Powder</a></li>
														<li><a href="">Diapers & Wipes</a></li>
													</ul>
												</div>

											</div>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Tea & Coeffe</h6>
														<li><a href="">Green Tea</a></li>
														<li><a href="">Ground Coffee</a></li>
														<li><a href="">Herbal Tea</a></li>
														<li><a href="">Instant Coffee</a></li>
														<li><a href=""> Tea </a></li>
														<li><a href="">Tea Bags</a></li>
													</ul>
												</div>

											</div>
										</ul>
									</li>
									<li><a href="">Gourmet</a></li>
									<li><a href="">Offers</a></li>
									<li><a href="">Contact</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>

<!-- //navigation -->

		<!-- vị trí ở đây -->
       @yield('main')
	   <!-- vị trí ở đây -->
       {{ $slot }}


<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>

					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Short Codes</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">FAQ's</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Groceries</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Household</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Personal Care</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Packaged Foods</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Beverages</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Create Account</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="footer-copy">

			<div class="container">
				<p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
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
