@isset($data)
    @if (isset($countProduct)&&$countProduct)
        <h2 class="count-search">Đã tìm thấy {{ $countProduct??0 }} sản phẩm</h2>
    @else
    <h2 class="count-search">Không tìm thấy sản phẩm nào</h2>
    @endif
    <div class="list-product-card">
        <div class="row">
            @if (isset($data)&&$data)
                @foreach ($data as $product)
                    @php
                        // $tran=$product->translationsLanguage()->first();
                        $link=$product->slug;
                    @endphp
                    <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <div class="product-item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="{{ $link }}">
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
                                                                        <a href="{{ $link }}">
                                                                            {{ $product->name }}
                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <span class="new-price">Giá: {{ $product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ" }}</span>
                                                                        @if ($product->sale>0)
                                                                            <span class="old-price">{{ number_format($product->price) }} {{ $unit  }}</span>
                                                                        @endif
                                                                    </div>
																	<div class="free"><img src="{{ asset('frontend/images/vanchuyen.png') }}" alt="vanchuyen"> Miễn phí vận chuyển toàn quốc</div>
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
        {{$data->appends(request()->all())->links()}}
        @endif
    </div>
@endisset
