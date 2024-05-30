@extends('layout.site')

@section('main')
<div class="">
    <div class="container">

        <div class="grid_3 grid_5">
            <div >

                <div id="myTabContent" class="">
                    <div >
                        <div class="agile-tp">
                            <h5>Kết quả tìm kiếm</h5>

                        </div>

                        <div class="agile_top_brands_grids" >

                            @foreach ($search as $item)
                            <div class="col-md-4 top_brand_left" style="margin-bottom: 10px;">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid_pos">
                                            <img src="{{url('public/site')}}/images/offer.png" alt=" " class="img-responsive" />
                                        </div>

                                     <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href="{{ route('home.xemchitiet',$item->id) }}"><img src="/doan101198/public/image/sach/{{ $item->product_img}}" alt=" " class="" style="width:90%;height:150px"/></a>
                                                    <p style="font-size: 17px"><a href="{{ route('home.xemchitiet',$item->id) }}">{{ $item->product_name }}</a></p>

                                                    <h4>{{ number_format($item->product_price) }}₫</h4>
                                                </div>
                                                <div class="snipcart-details top_brand_home_details">
                                                    <form action="{{url('/savecart')}}" method="GET"id="formclick">
                                                        @csrf @method('GET')

                                                        <input name="qty" type="hidden" min="1"  value="1" />
                                                        <input name="productid_hidden" type="hidden"  value="{{$item->id}}" />
                                                        <input  type="submit" name="submit" value="Add to cart" class="button" />
                                                    </form>
                                                  <!--  <a class="btn btn-primary btnclick" onclick=""  href="{route('giohang.add',['id'=>$item->id])}}">Add to cart</a> -->

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
<form action="" method="POST" id="formclick">
    @csrf @method('get')
</form>

@stop
