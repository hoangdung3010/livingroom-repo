@extends('layouts.main')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset --}}

            <div class="wrap-content-main wrap-template-product template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            @isset($dataProduct)
                                @if ($dataProduct)
                                    @if ($dataProduct->count())
                                    <h3 class="title-template">Kết quả tìm kiếm </h3>
                                    <div class="wrap-list-product">
                                        <div class="list-product-card">
                                            <div class="row">
                                                @foreach ($dataProduct as $product)
                                                {{-- @php
                                                    $tran=$product->translationsLanguage()->first();
                                                    $link=$product->slug_full;
                                                @endphp --}}
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="{{  route('product.detail',['slug'=>$product->slug])}}">
                                                                    <img src="{{ asset($product->product_img) }}" alt="{{ $product->name }}">
                                                                    @if ($product->sale)
                                                                    <span class="sale"> {{  $product->sale." %"}}</span>
                                                                    @endif

                                                                    @if($product->baohanh)
                                                                        <div class="km">
                                                                            {{ $product->baohanh }}
                                                                        </div>
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a href="{{  route('product.detail',['slug'=>$product->slug])}}">
                                                                       {{ $product->name }}
                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <span class="new-price">Giá: {{ $product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ" }}</span>
                                                                        @if ($product->sale>0)
                                                                            <span class="old-price">{{ number_format($product->price) }} {{ $unit  }}</span>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            @if (count($dataProduct))
                                            {{$dataProduct->links()}}
                                            @endif

                                        </div>
                                    </div>
                                    @endif
                                @endif
                            @endisset

                        </div>
                        {{-- <div class="col-lg-12 col-sm-12">
                            @isset($dataPost)
                                @if ($dataPost)
                                    @if ($dataPost->count())
                                        <h3 class="title-template-news">{{ __('search.ket_qua_tim_kiem_tin_tuc') }}</h3>
                                        <div class="list-news">
                                            <div class="row">
                                                @foreach ($dataPost as $post)
                                                <div class="fo-03-news col-lg-4 col-md-6 col-sm-6">
                                                    <div class="box">
                                                        <div class="image">
                                                            <a href="{{ makeLink("post",$post->id,$post->slug) }}"><img src="{{ asset($post->avatar_path) }}" alt="{{ $post->name }}"></a>
                                                        </div>
                                                        <h3><a href="{{ makeLink("post",$post->id,$post->slug) }}">{{ $post->name }}</a></h3>
                                                        <div class="date">{{ date_format($post->updated_at,"d/m/Y")}} - Admin</div>
                                                        <div class="desc">
                                                            {!! $post->description  !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>
                                        @if (count($dataPost))
                                        {{$dataPost->links()}}
                                        @endif
                                    @endif
                                @endif
                            @endisset
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
