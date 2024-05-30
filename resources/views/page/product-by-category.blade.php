@extends('layouts.main')

@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- @isset($breadcrumbs, $typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset --}}
            <div class="text-left wrap-breadcrumbs">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="{{route('home.index')}}">Trang chủ</a>
                                </li>
                                <li class="breadcrumbs-item"><a href="https://phongkhachhiendai.com/san-pham"
                                        class="currentcat">Sản phẩm</a></li>
                                <li class="breadcrumbs-item active"><a href="{{$category->slug}}"
                                        class="currentcat">{{$category->name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12  block-content-right">
                        <div class="group-title">
                            <div class="title title-img">{{ $category->name }}</div>
                        </div>
                        <div class="wrap-fill">

                            @php
                                $categoryPModel = new App\Models\Category();
                                $listCategoryProduct = $categoryPModel
                                    ->where('parent_id', $category->parent_id)
                                    ->orderby('order')
                                    ->latest()
                                    ->get();
                            @endphp
                            <div class="form-group">
                                <select name="" class="form-control field-change-link">
                                    {{-- <option value="">Loại sản phẩm</option> --}}
                                    @foreach ($listCategoryProduct as $categoryItem)
                                        <option value="{{ $categoryItem->id == $category->id ? '' : $categoryItem->slug }}"
                                            {{ $categoryItem->id == $category->id ? 'selected' : '' }}>{{ $categoryItem->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select form="formfill" class="form-control field-form" name="price">
                                    <option value="">Giá</option>
                                    @foreach ($priceSearch as $item)
                                        {{-- <option value="{{ $item['value'] }}" @if (isset($price)) {{ $item['value']==$price?"selected":"" }} @endif >
                                          {{ $item['end']? ($item['start']? 'Từ '.number_format($item['start']) :"Nhỏ hơn".number_format($item['end'])):""}}  {{ $item['start']? ($item['end']? 'đến '.number_format($item['end']):'> '.number_format($item['start'])):"" }}
                                       </option> --}}
                                        <option value="{{ $item['value'] }}"
                                            {{ $item['value'] == ($priceS ?? '') ? 'selected' : '' }}>
                                            {{ $item['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="orderby" id="" class="form-control field-form" form="formfill">
                                    <option value="0">Sắp sếp theo</option>
                                    <option value="1">Giá tăng dần</option>
                                    <option value="2">Giá giảm dần</option>
                                    {{-- <option value="3">Sale tăng dần</option>
                                    <option value="4">Sale giảm dần</option> --}}
                                </select>
                            </div>
                        </div>

                        {{-- <div class="info-count-pro">
                               <div class="count-pro">
                                    @if (isset($category) && $category)
                                        {{ $category->name }}
                                    @endif
                               </div>
                                <div class="orderby">
                                    <select name="orderby" id="" class="form-control field-form" form="formfill">
                                        <option value="0">Sắp sếp theo</option>
                                        <option value="1">Giá tăng dần</option>
                                        <option value="2">Giá giảm dần</option>
                                        <option value="3">Sale tăng dần</option>
                                        <option value="4">Sale giảm dần</option>
                                    </select>
                                </div>
                           </div> --}}
                        @isset($data)
                            <div class="wrap-list-product" id="dataProductSearch">
                                <div class="list-product-card">
                                    <div class="row">
                                        @if (isset($data) && $data)
                                            @foreach ($data as $product)
                                                @php
                                                    $tran = $product->first();
                                                    $link = $product->slug ?? '';
                                                @endphp
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                                                    <img src="{{ asset($product->product_img) }}"
                                                                        alt="{{ $product->name }}">
                                                                    @if ($product->sale)
                                                                        <span class="sale"> {{ $product->sale . ' %' }}</span>
                                                                    @endif

                                                                    @if ($product->baohanh)
                                                                        <div class="km">
                                                                            {{ $product->baohanh }}
                                                                        </div>
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a
                                                                        href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                                                        {{ $product->name }}
                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <span class="new-price">Giá:
                                                                        {{ $product->price_after_sale ? number_format($product->price_after_sale) . ' ' . $unit ?? '' : 'Liên hệ' }}</span>
                                                                    @if ($product->sale > 0)
                                                                        <span
                                                                            class="old-price">{{ number_format($product->price) }}
                                                                            {{ $unit ?? '' }}</span>
                                                                    @endif
                                                                </div>
                                                                @if ($tran->xuatsu)
                                                                    <div class="free1">
                                                                        <img src="{{ asset('frontend/images/hopqua.png') }}"
                                                                            alt="vanchuyen">{{ $tran->xuatsu }}
                                                                    </div>
                                                                @else
                                                                    <div class="free">
                                                                        <img src="{{ asset('frontend/images/vanchuyen.png') }}"
                                                                            alt="vanchuyen">Miễn phí vận chuyển toàn quốc
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @if (count($data))
                                        {{ $data->appends(request()->all())->onEachSide(1)->links() }}
                                    @endif
                                </div>
                            </div>
                        @endisset
                        @if ($category->content)
                            <div class="content-category" id="wrapSizeChange">
                                {!! $category->content !!}
                            </div>
                        @endif
                    </div>
                    {{-- <div class="col-lg-3 col-sm-12 col-xs-12 block-content-left">
                            @isset($sidebar)
                                @include('frontend.components.sidebar',[
                                    "categoryProduct"=>$sidebar['categoryProduct'],
                                    "categoryPost"=>$sidebar['categoryPost'],
                                    "categoryProductActive"=>$categoryProductActive,
                                    'fill'=>true,
                                    'product'=>true,
                                    'post'=>false,
                                ])
                            @endisset

                        </div> --}}

                </div>
            </div>
        </div>

        <form action="#" method="get" name="formfill" id="formfill" class="d-none">
            @csrf
        </form>

    </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $(document).on('change', '.field-form', function() {
                // $( "#formfill" ).submit();

                let contentWrap = $('#dataProductSearch');

                let urlRequest = '{{ url()->current() }}';
                let data = $("#formfill").serialize();
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data: data,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            contentWrap.html(html);
                        }
                    }
                });
            });
            $(document).on('change', '.field-change-link', function() {
                // $( "#formfill" ).submit();

                let link = $(this).val();
                if (link) {
                    window.location.href = link;
                }
            });
            // load ajax phaan trang
            // $(document).on('click', '.pagination a', function() {
            //     event.preventDefault();
            //     let contentWrap = $('#dataProductSearch');
            //     let href = $(this).attr('href');
            //     //alert(href);
            //     $.ajax({
            //         type: "Get",
            //         url: href,
            //         // data: "data",
            //         dataType: "JSON",
            //         success: function(response) {
            //             let html = response.html;

            //             contentWrap.html(html);
            //         }
            //     });
            // });
        });
    </script>
@endsection
