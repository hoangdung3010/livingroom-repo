@extends('layout.site')

@section('main')

<div class="checkout">
	<div class="container">
		<h2>Giỏ hàng của bạn có: <span>{{ Cart::count()}} sản phẩm</span></h2>
		<div class="checkout-right">
			@php
                 $content=Cart::content();
                 $stt=1;
            @endphp
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Số thứ tự</th>
						<th>Ảnh</th>
						<th>Sô lượng</th>
						<th>Tên sản phẩm</th>

						<th>Giá</th>
						<th>Xóa</th>
					</tr>
				</thead>
				@foreach($content as $content)
				<tr class="rem1">
					<td class="invert">{{$stt++}}</td>
					{{-- <td class="invert">{{Cart::total()}}</td> --}}
					<td class=""><img src="/doan101198/public/image/sach/{{$content->options->image}}" class="img-responsive" style="max-width:100px;" alt=""></td>
					<td class="invert">
						 <div class="quantity">
							<div class="quantity-select">
								<form action="{{URL('/update_quantity')}}" method="get">
									@csrf
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$content->qty}}"  >
									<input type="hidden" value="{{$content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
								</form>
							</div>
						</div>
					</td>
					<td class="invert">{{$content->name}}</td>

					<td class="invert">{{number_format($content ->price)}} VND</td>
					<td class="invert">
						<div class="rem">
							<div><a class="cart_quantity_delete close1" href="{{URL('/delete-cart/'.$content->rowId)}}"><i class=""></i></a> </div>
						</div>

					</td>
				</tr>
				@endforeach

							<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">
			<div class="checkout-left-basket">
				<ul>
					<li>Tổng tiền : <i></i> <span style="font-weight: bold;color:red">
						{{Cart::subtotal()}} VND
					</span></li>
				</ul>
			</div>
			<div class="checkout-right-basket">
				<a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>
			</div>
			<div class="clearfix"> </div>
			<div class="total_area">
				            <?php
								$kh_id=Session::get('customer_id');
								if($kh_id !=""){
							?>
							<a class="btn btn-primary" href="{{url('/thanhtoan')}}"> Đặt hàng </a>
							<?php
								 }
								 else {
							?>
							<a class="btn btn-primary" href="{{url('/login_khachhang')}}">Đặt hàng</a>
							<?php
								 }
							?>
			</div>
		</div>
	</div>
</div>


@stop()
