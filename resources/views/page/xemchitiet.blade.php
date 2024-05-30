
@extends('layout.site')

@section('main')

	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="active">Singlepage</li>
			</ol>
		</div>
	</div>
    <div class="products">
		<div class="container">
			<div class="agileinfo_single">

				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="/doan101198/public/image/sach/{{ $xem->product_img }}" alt=" " class="img-responsive" style="width:100%;height:450px">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2 style="color: #c00;">{{ $xem->product_name }}</h2>
					<div class="w3agile_description">
						<h4>Mô tả sản phẩm :</h4>
						<p>{!! $xem->description !!}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h3  class="m-sing">Giá từ: {{ number_format($xem->product_price) }} vnd</h3>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="{{url('/savecart')}}" method="get">
                @csrf
								<fieldset>
                  <label>Số lượng:</label>
									<input style="margin-top:10px;margin-bottom:10px" name="qty" type="number" min="1"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$xem->id}}" />
                  <input  type="submit" name="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>

						</div>

					</div>
				</div>




        </div>
		</div>

</div>

    @stop()
