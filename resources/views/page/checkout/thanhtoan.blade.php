@extends('layout.site')
@section('main')

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">thanh toán</li>
        </ol>
    </div>
</div>

<div class="checkout">
	<div class="container">
		<h2> xem lại giỏ hàng : <span>{{ Cart::count()}} sản phẩm</span></h2>
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
				@foreach($content as $v_content)
				<tr class="rem1">
					<td class="invert">{{$stt++}}</td>
					<td class=""><img src="/doan101198/public/image/sach/{{$v_content->options->image}}" class="img-responsive" style="max-width:100px;" alt=""></td>
					<td class="invert">
						 <div class="quantity">
							<div class="quantity-select">
								<form action="{{URL('/update_quantity')}}" method="get">
									@csrf
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
								</form>
							</div>
						</div>
					</td>
					<td class="invert">{{$v_content->name}}</td>

					<td class="invert">{{number_format($v_content ->price)}} VND</td>
					<td class="invert">
						<div class="rem">
							<div><a class="cart_quantity_delete close1" href="{{URL('/delete-cart/'.$v_content->rowId)}}"><i class=""></i></a> </div>
						</div>

					</td>
				</tr>
				@endforeach

							<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">
			<div class="checkout-left-basket">
				<h4>Thông tin khách hàng</h4>
				<ul>
					<li>Khách hàng :<i></i> <span> @php echo Session::get('customer_name'); @endphp</span></li>
					<li>Email : <i></i> <span>@php echo Session::get('customer_email'); @endphp</span></li>
					<li>Điện thoại : <i></i> <span>@php echo Session::get('customer_phone'); @endphp</span></li>
					<li>Địa chỉ :<i></i> <span>@php echo Session::get('customer_address'); @endphp</span></li>
					<li>Total <i>-</i> <span>
						{{Cart::subtotal()}} VND

					</span></li>
				</ul>
			</div>
			<div class="checkout-right-basket">
				<a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
			</div>
			<div class="clearfix"> </div>

            <h4 style="margin:40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>
			<form method="GET" action="{{URL::to('/order-place')}}">
				@csrf
			<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
					</span>
					<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
			</div>
			</form>
		</div>
	</div>
</div>




@stop
