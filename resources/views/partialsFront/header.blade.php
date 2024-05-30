  <!-- Chia header thành trường hợp tuỳ thuộc nhu cầu: Mobile và desktop -->
  
  <!-- Menu thiết kế cho di động -->
  <div class="menu_fix_mobile">
        <div class="close-menu">
            <a href="javascript:;" id="close-menu-button">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <ul class="nav-main">
            {{-- @include('partialsFront.menu',[
            'limit'=>3,
            'icon_d'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'icon_r'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'data'=>$header['menu_mobile'],
            'active'=>false
        ]) --}}

            {{-- @include('frontend.components.menu',[
            'limit'=>3,
            'icon_d'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'icon_r'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'data'=>$header['menu-mega'],
            'active'=>false
        ]) --}}

        </ul>
    </div>

    <div id="header" class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="header-top-left">
                            <div class="hotline_kh">
                                <i class="fas fa-phone-alt"></i>
                                <span>083 786 1166</span>
                            </div>
                            <ul>
                                <li>
                                    <a class="item-link"
                                        href="{{route('post.postByCategory',['slug'=>$catepost2->slug])}}">{{$catepost2->name??''}}</a>
                                </li>
                                <li>
                                    <a class="item-link" href="{{route('contact.lienhe')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header-top-right">
                            <div class="address">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="cart">
                                <span>Giỏ hàng</span>
                                <a href="{{route('cart.list')}}">

                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;"
                                        xml:space="preserve">
                                        <g>
                                            <g id="Bag">
                                                <g>
                                                    <path
                                                        d="M27.996,8.91C27.949,8.395,27.519,8,27,8h-5V6c0-3.309-2.69-6-6-6c-3.309,0-6,2.691-6,6v2H5
                                        C4.482,8,4.051,8.395,4.004,8.91l-2,22c-0.025,0.279,0.068,0.557,0.258,0.764C2.451,31.882,2.719,32,3,32h26
                                        c0.281,0,0.549-0.118,0.738-0.326c0.188-0.207,0.283-0.484,0.258-0.764L27.996,8.91z M12,6c0-2.206,1.795-4,4-4s4,1.794,4,4v2h-8
                                        V6z M4.096,30l1.817-20H10v2.277C9.404,12.624,9,13.262,9,14c0,1.104,0.896,2,2,2s2-0.896,2-2c0-0.738-0.404-1.376-1-1.723V10h8
                                        v2.277c-0.596,0.347-1,0.984-1,1.723c0,1.104,0.896,2,2,2c1.104,0,2-0.896,2-2c0-0.738-0.403-1.376-1-1.723V10h4.087l1.817,20
                                        H4.096z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="number-cart">
                                        0
                                    </span>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="box-header-main">
                    <div class="list-bar">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <div class="logo-head">
                        <div class="image">
                            <a href="{{route('home.index')}}"><img
                                    src="https://phongkhachhiendai.com/storage/setting/2/pkhd.png" alt="Logo"></a>
                        </div>
                    </div>



<!-- Sử dụng menu Desktop dựa trên dữ liệu truyền vào từ biến $header['menu'] -->
                    <div class="menu menu-desktop">
                        <ul class="nav-main">
                            @if(isset($categoryProductHome)&&$categoryProductHome->count()>0)
                            @foreach($categoryProductHome->childs()->where('active',1)->orderBy('order')->get() as $item)
                            <li class="nav-item ">
                                <a href="{{ route('product.productByCategory',['slug'=>$item->slug]) }}">
                                    <span>{{ $item->name }}</span>
                                    @if(count($item->childs)>0)
                                        <i class="fa fa-angle-down"></i>
                                    @endif
                                </a>
                                @if(count($item->childs)>0)
                                <ul class="nav-sub">
                                    @foreach($item->childs()->where('active',1)->orderBy('order')->get() as $item2)
                                    <li class="">
                                        <a href="{{ route('product.productByCategory',['slug'=>$item2->slug]) }}">
                                            <span>{{ $item2->name }}</span>
                                            @if(count($item2->childs)>0)
                                                <i class='fa fa-angle-right'></i>
                                            @endif
                                        </a>
                                        @if(count($item2->childs)>0)
                                        <ul class="nav-sub-c2">
                                            @foreach($item2->childs()->where('active',1)->orderBy('order')->latest()->get() as $itemChild)
                                            <li class="">
                                                <a href="{{ route('product.productByCategory',['slug'=>$itemChild->slug]) }}">
                                                    <span>{{ $itemChild->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            @endif

                            <li class="nav-item ">
                                <a href="{{route('post.postByCategory',['slug'=>$catepost->slug])}}"><span>{{$catepost->name}}</span>
                                </a>
                            </li>






                        </ul>
                    </div>
                    <div class="search_kh">
                        <form class="box_search_kh" method="get" action="{{route('home.search')}}">
                            <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" required="" style="color: #333">
                            <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <div class="box-header-main-right">
                        <ul>
                            <li class="icon-search show_search"><a><i class="fas fa-search"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div id="search">
            <div class="wrap-search-header-main  search-mobile">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box-search-header-main">


                                <div class="search-header">
                                    <form id="formSearchMb" name="formSearchMb" method="GET"
                                        action="https://phongkhachhiendai.com/search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword"
                                                placeholder="Nhập từ khóa tìm kiếm...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button class="form-control close-search" type="button"><i class="fa fa-times"
                        aria-hidden="true"></i></button>

            </div>
        </div>
    </div>

    {{--

<div id="header" class="header">
    <div class="header-main">
        <div class="container">
            <div class="box-header-main">
                <div class="list-bar">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div class="logo-head">
                    <div class="image">
                        <a href="{{ makeLink('home') }}"><img src="{{ $header['logo']->image_path }}"></a>
                    </div>
                </div>
                <div class="menu menu-desktop">
                    @include('frontend.components.menu',[
                        'limit'=>4,
                        'icon_d'=>'<i class="fas fa-chevron-down"></i>',
                        'icon_r'=>"<i class='fas fa-angle-right'></i>",
                        'data'=>$header['menu'],
                    ])
					 <li class="nav-item">
						<a class="nav-link" href="{check_link1}"><span>{name11} </span> </a>
						<ul class="nav-sub">
							<li class="nav-sub-item"><a href=""> Về chúng tôi</a>
								<ul class="nav-sub-child">
									<li class="nav-sub-item-child"><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Thông tin công ty</a></li>
								</ul>
							</li>
						</ul>
					</li>
                </div>
                <div class="search" id="search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <form class="form_search" id="form1" name="form1" method="get" action="{{ makeLink('search') }}">
                                    <input class="form-control" type="text" name="keyword" placeholder="Nhập từ khóa" required="">
                                    <button class="form-control" type="submit" name="gone22" id="gone22"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    <button class="form-control close-search" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header-main-right">
                    <ul>
                        <li class="icon-search show_search"><a><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li class="cart">
                            <a href="{{ route('cart.list') }}"><img src="{{ asset('frontend/images/bag.png') }}" alt="bag"><span class="number-cart">{{ $header['totalQuantity'] }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
