@extends('layout.site')

@section('main')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        <li data-target="#myCarousel" data-slide-to="4" class=""></li>

    </ol>
    <div class="carousel-inner" >
        <div class="item active">
            <div class="">


                    <img src="/doan101198/public/image/user/slide1.jpg" style="width:100%"/>


            </div>
        </div>
        <div class="item">
            <div class="">
                <div class="carousel-item">


                    <img src="/doan101198/public/image/user/slide2.jpg"style="width:100%" />
                </div>
            </div>
        </div>
        <div class="item">
            <div class="">
                <div class="carousel-item">


                    <img src="/doan101198/public/image/user/slide3.jpg" style="width:100%"/>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="">
                <div class="carousel-item">

                    <img src="/doan101198/public/image/user/slide1.jpg" style="width:100%"/>
                </div>
            </div>
        </div>

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="top-brands">
		<div class="container">
		<h2>ƯU ĐÃI BÁN CHẠY NHẤT</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Trà Sữa</a></li>

                    </ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">

							<div class="agile_top_brands_grids" >

                                @foreach ($pr1 as $item)
                                <div class="col-md-4 top_brand_left" style="margin-bottom: 10px;">
                                    <div class="hover14 column">
<div class="agile_top_brand_left_grid">
                                            <div class="agile_top_brand_left_grid_pos">
                                                <img src="{{url('public/site')}}/images/new.png" alt=" " class="img-responsive" />
                                            </div>

                                         <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
                                                        <a href="{{ route('home.xemchitiet',$item->id) }}"><img src="/doan101198/public/Image/sach/{{ $item->product_img}}" alt=" " class="" style="width:100%;height:250px"/></a>
                                                        <p style="font-size: 17px"><a href="{{ route('home.xemchitiet',$item->id) }}">{{ $item->name }}</a></p>

                                                        <h4>{{ number_format($item->product_price) }}₫</h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('/savecart')}}" method="GET">
                                                            @csrf

                                                            <input name="qty" type="hidden" min="1"  value="1" />
                                                            <input name="productid_hidden" type="hidden"  value="{{$item->id}}" />
                                                            <input  type="submit" name="submit" value="Add to cart" class="button" />
                                                        </form>
                                                        <!--  <a class="btn btn-primary btnclick" onclick=""  href="{route('giohang.add',['id'=>$item->id])}}">Add to cart</a>-->

                                                         <!-- url('/add_cart/'.$item->id)}},onclick="add_Cart({$item->id}})" -->
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>


                                        </div>

                                    </div>
                                </div>

                                @endforeach
                                <div class="clearfix"> </div>
                            </div>


						</div>

					</div>
				</div>
			</div>
		</div>

</div>
<div class="top-brands">
		<div class="container">
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Trà Chanh</a></li>

                    </ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">

							<div class="agile_top_brands_grids" >

                                @foreach ($pr2 as $item)
                                <div class="col-md-4 top_brand_left" style="margin-bottom: 10px;">
                                    <div class="hover14 column">
                                        <div class="agile_top_brand_left_grid">
                                            <div class="agile_top_brand_left_grid_pos">
                                                <img src="{{url('public/site')}}/images/new.png" alt=" " class="img-responsive" />
                                            </div>

                                         <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
                                                        <a href="{{ route('home.xemchitiet',$item->id) }}"><img src="/doan101198/public/Image/sach/{{ $item->product_img}}" alt=" " class="" style="width:100%;height:250px"/></a>
                                                        <p style="font-size: 17px"><a href="{{ route('home.xemchitiet',$item->id) }}">{{ $item->product_name }}</a></p>

                                                        <h4>{{ number_format($item->product_price) }}₫</h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('/savecart')}}" method="GET">
                                                            @csrf

                                                            <input name="qty" type="hidden" min="1"  value="1" />
                                                            <input name="productid_hidden" type="hidden"  value="{{$item->id}}" />
                                                            <input  type="submit" name="submit" value="Add to cart" class="button" />
                                                        </form>
                                                        <!--  <a class="btn btn-primary btnclick" onclick=""  href="{route('giohang.add',['id'=>$item->id])}}">Add to cart</a>-->

                                                         <!-- url('/add_cart/'.$item->id)}},onclick="add_Cart({$item->id}})" -->
</div>
                                                </div>
                                            </figure>
                                        </div>


                                        </div>

                                    </div>
                                </div>

                                @endforeach
                                <div class="clearfix"> </div>
                            </div>


						</div>

					</div>
				</div>
			</div>
		</div>

</div>
<div class="top-brands">
		<div class="container">
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Cà Phê</a></li>

                    </ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">

							<div class="agile_top_brands_grids" >

                                @foreach ($pr3 as $item)
                                <div class="col-md-4 top_brand_left" style="margin-bottom: 10px;">
                                    <div class="hover14 column">
                                        <div class="agile_top_brand_left_grid">
                                            <div class="agile_top_brand_left_grid_pos">
                                                <img src="{{url('public/site')}}/images/new.png" alt=" " class="img-responsive" />
                                            </div>

                                         <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
                                                        <a href="{{ route('home.xemchitiet',$item->id) }}"><img src="/doan101198/public/Image/sach/{{ $item->product_img}}" alt=" " class="" style="width:100%;height:250px"/></a>
                                                        <p style="font-size: 17px"><a href="{{ route('home.xemchitiet',$item->id) }}">{{ $item->product_name }}</a></p>

                                                        <h4>{{ number_format($item->product_price) }}₫</h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('/savecart')}}" method="GET">
                                                            @csrf
<input name="qty" type="hidden" min="1"  value="1" />
                                                            <input name="productid_hidden" type="hidden"  value="{{$item->id}}" />
                                                            <input  type="submit" name="submit" value="Add to cart" class="button" />
                                                        </form>
                                                        <!--  <a class="btn btn-primary btnclick" onclick=""  href="{route('giohang.add',['id'=>$item->id])}}">Add to cart</a>-->

                                                         <!-- url('/add_cart/'.$item->id)}},onclick="add_Cart({$item->id}})" -->
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>


                                        </div>

                                    </div>
                                </div>

                                @endforeach
                                <div class="clearfix"> </div>
                            </div>


						</div>

					</div>
				</div>
			</div>
		</div>

</div>

<div class="top-brands">
		<div class="container">
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Đồ Ăn Vặt</a></li>

                    </ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">

							<div class="agile_top_brands_grids" >

                                @foreach ($pr4 as $item)
                                <div class="col-md-4 top_brand_left" style="margin-bottom: 10px;">
                                    <div class="hover14 column">
                                        <div class="agile_top_brand_left_grid">
                                            <div class="agile_top_brand_left_grid_pos">
                                                <img src="{{url('public/site')}}/images/new.png" alt=" " class="img-responsive" />
                                            </div>

                                         <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
<a href="{{ route('home.xemchitiet',$item->id) }}"><img src="/doan101198/public/Image/sach/{{ $item->product_img}}" alt=" " class="" style="width:100%;height:250px"/></a>
                                                        <p style="font-size: 17px"><a href="{{ route('home.xemchitiet',$item->id) }}">{{ $item->product_name }}</a></p>

                                                        <h4>{{ number_format($item->product_price) }}₫</h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('/savecart')}}" method="GET">
                                                            @csrf

                                                            <input name="qty" type="hidden" min="1"  value="1" />
                                                            <input name="productid_hidden" type="hidden"  value="{{$item->id}}" />
                                                            <input  type="submit" name="submit" value="Add to cart" class="button" />
                                                        </form>
                                                        <!--  <a class="btn btn-primary btnclick" onclick=""  href="{route('giohang.add',['id'=>$item->id])}}">Add to cart</a>-->

                                                         <!-- url('/add_cart/'.$item->id)}},onclick="add_Cart({$item->id}})" -->
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>


                                        </div>

                                    </div>
                                </div>

                                @endforeach
                                <div class="clearfix"> </div>
                            </div>


						</div>

					</div>
				</div>
			</div>
		</div>

</div>

<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>

      </ol>

    </div><!-- /.carousel -->
<!--banner-bottom-->
<!--banner-bottom-->
<!--brands-->

<!--//brands-->
<!-- new -->
    <form action="" method="POST" id="">
        @csrf @method('GET')
    </form>


@endsection
