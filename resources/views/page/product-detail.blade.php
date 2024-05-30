@extends('layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
<style>
   .Evaluate {
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
    margin-bottom: 15px;
    padding-top: 10px;
}
.text_header {
    font-size: 24px;
    font-weight: 500;
    text-align: justify;
}
.Evaluate .row {
    margin-top: 15px;
    padding: 10px 0;
    border: 1px solid #dee2e6;
}
.Evaluate .itemEvaluate {
    text-align: center;
}
.itemEvaluate .vote i {
    color: #faa738;
}
.Evaluate .itemEvaluate {
    text-align: center;
}
.itemEvaluate ul li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}
.checked {
    color: #ffa53f !important;
}
.percent-rating {
    width: calc(100% - 70px);
    height: 24px;
    border-radius: 50px;
    overflow: hidden;
    background-color: rgb(209, 209, 214);
}
.box-percent {
    width: 0;
    height: 100%;
    background-color: #bd140c;
}
.Evaluate .itemEvaluate {
    text-align: center;
}
.itemEvaluate button {
    background: #d00;
    color: #fff;
    padding: 7px 20px;
    font-size: 15px;
    border-radius: 3px;
    border: solid 1px #ce0101;
    transition: all .3s ease;
    display: inline-block;
    margin-top: 20px;
    outline: none;
}
.review .text_header_review {
    font-weight: bold;
    margin: 1rem 0 0.5rem;
}
.review form textarea {
    padding: 15px;
    width: 100%;
    padding: 15px;
    width: 100%;
    margin: 5px 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.review form .item {
    display: flex;
    padding: 5px 0;
}
.review form .item label {
    margin-bottom: 0;
    width: 15%;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400;
    font-size: 14px;
    margin-bottom: 2px;
}
.review form .item label {
    margin-bottom: 0;
    width: 15%;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400;
    font-size: 14px;
    margin-bottom: 2px;
}
.review form .item input {
    width: 85%;
    font-size: 14px;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.review form .item {
    display: flex;
    padding: 5px 0;
}
.review form .item {
    display: flex;
    padding: 5px 0;
}
.item_btn {
    padding: 5px 0;
    padding-left: 15%;
}
.item_btn .btn_submit {
    background: #d00;
    color: #fff;
    padding: 7px 20px;
    font-size: 15px;
    border-radius: 3px;
    border: solid 1px #ce0101;
    margin-right: 1rem;
    outline: none;
    transition: all .3s ease;
}
.item_btn .btn_close {
    color: #222;
    outline: none;
    border: none;
    background-color: transparent;
    transition: all .3s ease;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400;
    font-size: 14px;
    margin-bottom: 2px;
}
.review .vote i {
    cursor: pointer;
}
.itemcmt {
    border-top: solid 1px #eee;
    padding: 15px 0;
}
.name_cmt {
    display: flex;
    gap: 10px;
    align-items: center;
    font-weight: bold;
    margin-bottom: 10px;
}
.name_cmt .avata {
    background: #eee;
    color: #999;
    width: 27px;
    height: 27px;
    display: inline-block;
    line-height: 27px;
    text-align: center;
}
.contentcmt {
    margin-bottom: 1rem;
}
.time_trl_cmt {
    color: #686868;
    display: flex;
    gap: 10px;
    align-items: center;
    padding-bottom: 10px;
}
.time_trl_cmt .trl {
    color: #ec3237;
    cursor: pointer;
}
.itemcmt .sumit_commet {
    position: relative;
}
.sumit_commet form {
    border: solid 1px #ddd;
    background: #f8f8f8;
    padding: 10px;
    width: 100%;
}
.aaaaa form {
    border: none !important;
    background: transparent !important;
    padding: 0 !important;
}
.aaaaa textarea {
    padding: 0.375rem 0.75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.aaaaa form .fomt_bg {
    border: solid 1px #ddd;
    background: #f8f8f8;
    padding: 10px;
}
.sumit_commet .input {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.input input {
    width: 47%;
    margin-bottom: 1rem;
    font-size: 14px;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.cloe_comet i {
    cursor: pointer;
    font-size: 25px;
}
.btn_commet {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    font-weight: 400;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.cmt_qt {
    border-radius: 5px 5px 0 0;
    margin-top: 10px;
    background: #f6f6f6;
    border: 1px solid #e1e1e1;
    padding: 15px;
}
.header_cmt_qt {
    font-weight: bold;
    margin-right: 2px;
}
.header_cmt_qt .note {
    color: #fff;
    font-size: 0.7em;
    background: #ec3237;
    font-style: normal;
    padding: 2px 5px;
}
.commet textarea {
    width: 100%;
    padding-left: 0.5rem;
    font-size: 14px;
}
.title_sp_detail {
    text-align: left;
    padding: 15px 0px 15px 0px;
}
.title_sp_detail h1 {
    padding: 0;
    margin: 0 0 10px 0;
    text-align: left;
    font-size: 25px;
    font-weight: 600;
    color: #333;
    line-height: 1.5;
}
.statistical {
    display: flex;
    gap: 15px;
}
</style>
@section('content')
@if (Session::has('msg'))
<script type="text/javascript">
    alert("{{ Session::get('msg') }}");
</script>
@endif
    <div class="content-wrapper">
        <div class="main">
            <div class="text-left wrap-breadcrumbs">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="">Trang chu</a>
                                </li>
                                <li class="breadcrumbs-item active"><a href=""
                                        class="currentcat">{{ $data->category->name }}</a></li>
                                <li class="breadcrumbs-item"><a href="" class="currentcat">{{ $data->name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog-product-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="title_sp_detail">
                                <h1>{{ $data->name }}</h1>
                                <div class="statistical itemEvaluate">
                                    <div class="vote">
                                        @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $avgRating)
                                        <i class="fas fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                                    </div>
                                    <div class="statistical_vote">
                                        ({{ $data->stars()->where('active', 1)->count() }} lượt đánh giá)
                                    </div>
                                    <div class="show_statistical">
                                        <span> Lượt xem: <b>{{ $data->view }}</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12  block-content-right">
                            <div class="row">
                                <div class="col-sm-12" id="dataProductSearch">
                                    <div class="box-product-main">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="box-image-product">
                                                    <div class="image-main block">
                                                        <a class="hrefImg" href="{{ asset($data->product_img) }}"
                                                            data-lightbox="image">
                                                            <i class="fas fa-expand-alt"></i>
                                                            <img id="expandedImg" src="{{ asset($data->product_img) }}">
                                                        </a>
                                                        <div class="desc-pro-detail-sm">
                                                            ***Lưu Ý: Hình ảnh chi tiết minh hoạ.
                                                        </div>
                                                    </div>
                                                    @if ($data->images()->count())
                                                        <div class="list-small-image">
                                                            <div class="pt-box autoplay5-product-detail">
                                                                {{-- <div class="small-image column">
                                                                <img src="{{ ($data->avatar_path) }}" alt="">
                                                            </div> --}}
                                                                @foreach ($data->images as $image)
                                                                    <div class="small-image column">
                                                                        <img src="{{ $image->image_path }}"
                                                                            alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 product-detail-infor">
                                                <div class="box-infor">
                                                    <div class="title_sp_detail">
                                                        <h1>{{ $data->name }}</h1>
                                                    </div>
                                                    {{-- <div class="">
														<span class="pt"><b>ĐÔNG PHƯƠNG</b>  NỘI THẤT  BẢO TRÌ TRỌN ĐỜI</span>
													</div> --}}
                                                    <div class="list-attr">
                                                        <div class="attr-item">
                                                            {{-- <h3>Chọn loại giá để xem giá sản phẩm</h3> --}}
                                                            <div class="price">
                                                                @if ($data->price)
                                                                    @if ($data->price_after_sale)
                                                                        <span
                                                                            id="priceChange">{{ number_format($data->price_after_sale) }}
                                                                            <span class="donvi">đ</span></span>
                                                                    @endif

                                                                    @if ($data->sale > 0)
                                                                        <span class="title_giacu">Giá cũ: </span>
                                                                        <span
                                                                            class="old-price">{{ number_format($data->price) }}
                                                                            {{ $unit }}</span>

                                                                        <div class="tiet_kiem">
                                                                            <div class="g2">(Tiết kiệm:
                                                                                <b>{{ number_format($data->price - $data->price_after_sale) }}</b>)
                                                                            </div>
                                                                            <div class="tk">
                                                                                <b>-{{ $data->sale }}%</b>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    Liên hệ
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--
                                                    <div class="masp">
														<i class="far fa-check-square"></i> Mã sản phẩm: <strong>{{ $data->masp }}</strong>
													</div>
                                                    --}}
                                                    @if ($data->model)
                                                        <div class="status"><i class="far fa-check-square"></i> Thương hiệu:
                                                            <span> <strong>{{ $data->model }}</strong> </span>
                                                        </div>
                                                    @endif
                                                    @if ($data->tinh_trang)
                                                        <div class="status"><i class="far fa-check-square"></i> Trạng thái:
                                                            <span> <strong>{{ $data->tinh_trang }}</strong> </span>
                                                        </div>
                                                    @endif
                                                    {{-- @foreach ($data->attributes()->latest()->get() as $item)
                                                    <div class="status">
                                                        <strong><i class="far fa-check-square"></i> {{ optional($item->parent)->name }}: </strong>
                                                       <span> {{ $item->name }} </span>
                                                    </div>
                                                    @endforeach --}}
                                                    {{--
                                                    @if ($data->baohanh)
                                                    <div class="status">
                                                        <strong><i class="far fa-check-square"></i> Màu sắc: </strong>
                                                        <span> {{ $data->baohanh }} </span>
                                                    </div>
                                                    @endif
                                                    --}}
                                                    @if ($data->xuatsu)
                                                        <div class="status">
                                                            <strong><i class="far fa-check-square"></i> Phụ kiện kèm theo:
                                                            </strong>
                                                            <span> {{ $data->xuatsu }} </span>
                                                        </div>
                                                    @endif
                                                    <div class="info-desc">
                                                        <div class="col_2_desc">
                                                            <div class="desc">
                                                                {!! $data->description !!}
                                                            </div>
                                                        </div>
                                                        <div class="col_2_desc">
                                                            <div class="desc">
                                                                {!! $data->content4 !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($data->content3 != null)
                                                        <div class="quatang">
                                                            <div class="title">
                                                                Quà tặng khi mua sản phẩm
                                                            </div>
                                                            <div class="box_quatang">
                                                                {!! $data->content3 !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="quatang">
                                                        <div class="title">
                                                            HỆ THỐNG SHOWROOM CHÍNH HÃNG
                                                        </div>
                                                        <div class="box_quatang1">
                                                            <ul>
                                                                <li>242 Minh Khai, Q. Hai Bà Trưng, TP.Hà Nội</li>
                                                                <li>51A Chu Văn An, P. Lê Lợi, Q. Ngô Quyền, TP. Hải Phòng
                                                                </li>
                                                                <li>07B Tô Vĩnh Diện, TP Pleiku, Tỉnh Gia Lai</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="wrap-price">

                                                        <div class="list-attr1">
                                                            {{--
                                                            <div class="attr-item">
                                                                <div class="form-group">
                                                                    <label for="">Charm</label>
                                                                    <select name="" id="input" class="form-control" required="required">
                                                                        <option value="">Vui lòng chọn</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            --}}

                                                            {{-- <div class="attr-item" style="width: auto;display: inline-block;">
                                                                <div class="form-group" style="display: flex;align-items: center;">
                                                                    <label for="" style="white-space: nowrap;margin-bottom: 0;font-size: 15px;">Chọn kích thước</label>
                                                                    <select name="" id="optionChange" class="form-control optionChange" required="required" style="font-size: 14px;padding: 6px 12px 6px 4px;margin-left: 10px;">
                                                                        <option value="{{ $data->price_after_sale??0 }}-0">{{ $data->size??'Mặc định '.$data->size }}</option>
                                                                        @foreach ($data->options as $item)
                                                                             <option value="{{ $item->price_after_sale??0 }}-{{ $item->id }}">{{ $item->size }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div> --}}
                                                            <div class="attr-item"
                                                                style="display: inline-block; margin-left: 20px;">
                                                                <div class="form-group">
                                                                    <label for="">Số lượng</label>
                                                                    <div class="wrap-add-cart" id="product_add_to_cart">
                                                                        <div class="box-add-cart">

                                                                            <div class="pro_mun">
                                                                                <a class="cart_qty_reduce cart_reduce">
                                                                                    <span class="iconfont icon fas fa-minus"
                                                                                        aria-hidden="true"></span>
                                                                                </a>
                                                                                <input type="text" value="1"
                                                                                    class="" name="cart_quantity"
                                                                                    onkeyup="this.value=this.value.replace(/[^\d]/g,'')"
                                                                                    maxlength="5" min="1"
                                                                                    id="cart_quantity" placeholder="">

                                                                                <a class="cart_qty_add">
                                                                                    <span class="iconfont icon fas fa-plus"
                                                                                        aria-hidden="true"></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- <div class="attr-item">
                                                                <div class="form-group">
                                                                    <label for="">Size cổ tay</label>
                                                                    <input type="number" min="0" max="21" step="0.5" class="form-control" value="12">
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div class="text-left">
                                                            <div class="sign_now">
                                                                <a href="javascript" data-toggle="modal"
                                                                    data-target="#sign_now">
                                                                    Đăng ký tư vấn
                                                                </a>
                                                            </div>
                                                            <div class="box-buy">
                                                                <a class="add-to-cart" id="addCart"
                                                                    data-url="{{ route('cart.add', ['id' => $data->id]) }}"
                                                                    data-start="{{ route('cart.add', ['id' => $data->id]) }}">Thêm
                                                                    giỏ hàng</a>
                                                            </div>
                                                            <div class="hen_lich">
                                                                <a href="javascript" data-toggle="modal"
                                                                    data-target="#modal-first">
                                                                    Hẹn lịch đến xem
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="box-price">
                                                        <span class="price price-number">
                                                        {{ number_format($data->price_after_sale) }} {{ $unit }}
                                                        </span>
                                                        @if ($data->sale)
                                                        <span class="price old-price"> {{ number_format($data->price) }} {{ $unit }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="box-buy">
                                                        <a class="btn-buynow addnow" href="{{ route('cart.buy',['id' => $data->id,]) }}"><span>Mua ngay</span></a>
                                                        <a class="add-to-cart" data-url="{{ route('cart.add',['id' => $data->id,]) }}"><span>Thêm vào giỏ</span></a>
                                                        <a class="add-compare" data-url="{{ route('compare.add',['id' => $data->id,]) }}"><span>Thêm vào so sánh</span></a>
                                                    </div> --}}

                                                    <div class="modal fade modal-First" id="modal-first" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content" image="">
                                                                <div class="modal-body">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                    <div class="image-modal">
                                                                        <div class="info_product_modal">
                                                                            <div class="title">
                                                                                {{ $data->name }}
                                                                            </div>
                                                                            <div class="image">
                                                                                <img src="{{ asset($data->product_img) }}"
                                                                                    alt="{{ $data->name }}">
                                                                            </div>
                                                                            <div class="list-attr">
                                                                                <div class="attr-item">
                                                                                    <div class="price">
                                                                                        @if ($data->price)
                                                                                            @if ($data->price_after_sale)
                                                                                                <span
                                                                                                    id="priceChange">{{ number_format($data->price_after_sale) }}
                                                                                                    <span
                                                                                                        class="donvi">đ</span></span>
                                                                                            @endif

                                                                                            @if ($data->sale > 0)
                                                                                                <span
                                                                                                    class="title_giacu">Giá
                                                                                                    cũ: </span>
                                                                                                <span
                                                                                                    class="old-price">{{ number_format($data->price) }}
                                                                                                    {{ $unit }}</span>

                                                                                                <div class="tiet_kiem">
                                                                                                    <div class="g2">
                                                                                                        (Tiết kiệm:
                                                                                                        <b>{{ number_format($data->price - $data->price_after_sale) }}</b>)
                                                                                                    </div>
                                                                                                    <div class="tk">
                                                                                                        <b>-{{ $data->sale }}%</b>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                        @else
                                                                                            Liên hệ
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="newsletter-content">
                                                                            <h2>ĐẶT LỊCH ĐẾN SHOWROOM</h2>
                                                                            <div class="dec">(Để chúng tôi phục vụ chu
                                                                                đáo hơn)</div>
                                                                            <form
                                                                                action="{{ route('contact.storeAjax') }}"
                                                                                data-url="{{ route('contact.storeAjax') }}"
                                                                                data-ajax="submit" data-target="alert"
                                                                                data-href="#modalAjax"
                                                                                data-content="#content" data-method="POST"
                                                                                method="POST"
                                                                                class="input-wrapper input-wrapper-inline input-wrapper-round">
                                                                                @csrf
                                                                                <input type="text" class="form-control"
                                                                                    name="content"
                                                                                    placeholder="Sản phẩm muốn xem *"
                                                                                    value="{{ $data->name }}" required>
                                                                                <input type="text" class="form-control"
                                                                                    name="name" placeholder="Họ tên *">
                                                                                <input type="tel" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" class="form-control"
                                                                                    name="phone"
                                                                                    placeholder="Số điện thoại *" required>
                                                                                <label>Ngày đến</label>
                                                                                <input type="date"
                                                                                    class="form-control ngay_den"
                                                                                    name="date_start"
                                                                                    placeholder="Ngày đến xem">

                                                                                <button>Đăng ký ngay</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade modal-First" id="sign_now" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content" image="">
                                                                <div class="modal-body">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                    <div class="image-modal">
                                                                        <div class="info_product_modal">
                                                                            <div class="title">
                                                                                {{ $data->name }}
                                                                            </div>
                                                                            <div class="image">
                                                                                <img src="{{ asset($data->product_img) }}"
                                                                                    alt="{{ $data->name }}">
                                                                            </div>
                                                                            <div class="list-attr">
                                                                                <div class="attr-item">
                                                                                    <div class="price">
                                                                                        @if ($data->price)
                                                                                            @if ($data->price_after_sale)
                                                                                                <span
                                                                                                    id="priceChange">{{ number_format($data->price_after_sale) }}
                                                                                                    <span
                                                                                                        class="donvi">đ</span></span>
                                                                                            @endif

                                                                                            @if ($data->sale > 0)
                                                                                                <span
                                                                                                    class="title_giacu">Giá
                                                                                                    cũ: </span>
                                                                                                <span
                                                                                                    class="old-price">{{ number_format($data->price) }}
                                                                                                    {{ $unit }}</span>

                                                                                                <div class="tiet_kiem">
                                                                                                    <div class="g2">
                                                                                                        (Tiết kiệm:
                                                                                                        <b>{{ number_format($data->price - $data->price_after_sale) }}</b>)
                                                                                                    </div>
                                                                                                    <div class="tk">
                                                                                                        <b>-{{ $data->sale }}%</b>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                        @else
                                                                                            Liên hệ
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="newsletter-content">
                                                                            <h2>ĐĂNG KÝ NHẬN TƯ VẤN</h2>
                                                                            <div class="dec">(Điền đầy thủ thông tin vào ô nhập thông tin)</div>
                                                                            <form action="{{ route('contact.storeAjax1') }}"  data-url="{{ route('contact.storeAjax1') }}" id="myForm" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                                                                                @csrf
                                                                                <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="{{ $data->name }}" required>
                                                                                <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                                                                                <input type="tel" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" class="form-control" id="phone" name="phone" placeholder="Số điện thoại *" required>
                                                                                <input type="text" class="form-control" name="address_detail" placeholder="Địa chỉ" required>

                                                                                <textarea class="form-control" name="content2" placeholder="Nội dung"></textarea>
                                                                                <button>Đăng ký ngay</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-product">
                                        <div role="tabpanel">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#mota"
                                                        role="tab" aria-controls="profile" aria-selected="false">Chi
                                                        Tiết Sản Phẩm</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#chinhsach"
                                                        role="tab" aria-controls="home" aria-selected="true">Bảo Hành
                                                        Đổi Trả</a>
                                                </li>
                                                {{--
												<li class="nav-item">
                                                    <a class="nav-link"  data-toggle="tab" href="#kichthuoc" role="tab" aria-controls="tabkichthuoc" aria-selected="true">Hướng Dẫn Đo Size</a>
                                                </li>
                                                --}}
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade  show active" id="mota" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    {!! $data->content !!}
                                                </div>
                                                <div class="tab-pane fade" id="chinhsach" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    {!! $data->content2 !!}
                                                </div>
                                                {{--
												<div class="tab-pane fade" id="kichthuoc" role="tabpanel" aria-labelledby="tabkichthuoc-tab">
                                                    {!! optional($huongDan)->description !!}
                                                </div>
                                                --}}
                                            </div>
                                        </div>
                                        {{-- <div class="tab-link">
                                            <ul>
                                                <li><a href="#chinhsach" class="active">Chính sách</a></li>
                                                <li><a href="#mota" class="">Mô tả sản phẩm</a></li>
                                                <li><a href="#thongso">Thông số kỹ thuật</a></li>
                                                <li><a href="#chinhsachvanchuyen">Chính sách vận chuyển</a></li>
                                                <li><a href="#chinhsachbaohanh">Chính sách bảo hành</a></li>
                                            </ul>
                                        </div>

                                        <div class="tab-pro-content" id="wrapSizeChange">
                                            <div class="tab-item" id="chinhsach">
                                                Đang cập nhập
                                            </div>
                                            <div class="tab-item" id="mota">
                                                {!! $data->content !!}
                                            </div>
                                            <div class="tab-item" id="thongso">
                                                {!! $data->content2 !!}
                                            </div>
                                            <div class="tab-item" id="chinhsachvanchuyen">
                                                {!! $data->content3 !!}
                                            </div>
                                            <div class="tab-item" id="chinhsachbaohanh">
                                                {!! $data->content4 !!}
                                            </div>
                                        </div> --}}
                                        <div class="col-12 col-lg-12 ">
                                            <div class="Evaluate">
                                                <div class="text_header">
                                                    Đánh giá &amp; Nhận xét về {{$data->name}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 itemEvaluate">
                                                        <p> {{round($avgRating, 1)}}</p>
                                                        <div class="vote">
                                                            @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $avgRating)
                                                            <i class="fas fa-star"></i>
                                                            @else
                                                            <i class="far fa-star"></i>
                                                            @endif
                                                            @endfor
                                                        </div>
                                                        <span>{{$data->stars()->where('active', 1)->count()}}</span>
                                                         Đánh giá
                                                    </div>
                                                    <div class="col-lg-4 col-12 itemEvaluate">
                                                        <ul>
                                                            @if (isset($star5) && $star5)
                                                            <li><span>5 <i class="fas fa-star checked"></i></span>
                                                                <div class="percent-rating @if ($star5->count() !== 0) rating_detail_item_js @else allowed @endif" data-star="5"  @if ($star5->count() !== 0) onClick="window.location='#commentData';" @endif>
                                                                    <div class="box-percent" @if ($countRating != 0) style="width: {{(count($star5)/$countRating)*100}}%;" @endif>
                                                                        <div class="main-percent"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-cout">{{$star5->count()}}</div>
                                                            </li>
                                                            @endif
                                                            @if (isset($star4) && $star4)
                                                            <li><span>4 <i class="fas fa-star checked"></i></span>
                                                                <div class="percent-rating @if ($star4->count() !== 0) rating_detail_item_js @else allowed @endif" data-star="4"  @if ($star4->count() !== 0) onClick="window.location='#commentData';" @endif>
                                                                    <div class="box-percent" @if ($countRating != 0) style="width: {{(count($star4)/$countRating)*100}}%;" @endif>
                                                                        <div class="main-percent"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-cout">{{$star4->count()}}</div>
                                                            </li>
                                                            @endif
                                                            @if (isset($star3) && $star3)
                                                            <li><span>3 <i class="fas fa-star checked"></i></span>
                                                                <div class="percent-rating @if ($star3->count() !== 0) rating_detail_item_js @else allowed @endif" data-star="3"  @if ($star3->count() !== 0) onClick="window.location='#commentData';" @endif>
                                                                    <div class="box-percent" @if ($countRating != 0) style="width: {{(count($star3)/$countRating)*100}}%;" @endif>
                                                                        <div class="main-percent"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-cout">{{$star3->count()}}</div>
                                                            </li>
                                                            @endif
                                                            @if (isset($star2) && $star2)
                                                            <li><span>2 <i class="fas fa-star checked"></i></span>
                                                                <div class="percent-rating @if ($star2->count() !== 0) rating_detail_item_js @else allowed @endif" data-star="2"  @if ($star2->count() !== 0) onClick="window.location='#commentData';" @endif>
                                                                    <div class="box-percent" @if ($countRating != 0) style="width: {{(count($star2)/$countRating)*100}}%;" @endif>
                                                                        <div class="main-percent"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-cout">{{$star2->count()}}</div>
                                                            </li>
                                                            @endif
                                                            @if (isset($star1) && $star1)
                                                            <li><span>1 <i class="fas fa-star checked"></i></span>
                                                                <div class="percent-rating @if ($star1->count() !== 0) rating_detail_item_js @else allowed @endif" data-star="1"  @if ($star1->count() !== 0) onClick="window.location='#commentData';" @endif>
                                                                    <div class="box-percent" @if ($countRating != 0) style="width: {{(count($star1)/$countRating)*100}}%;" @endif>
                                                                        <div class="main-percent"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-cout">{{$star1->count()}}</div>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 col-12 itemEvaluate">
                                                        <p>Bạn đã dùng sản phẩm này?</p>
                                                        <button class="closeShow">Gửi đánh giá của bạn</button>
                                                    </div>
                                                </div>
                                                <div class="review" style="display: none">
                                                    <div class="text_header_review ">
                                                        Gửi nhận xét của bạn
                                                    </div>
                                                    <form action="{{ route('product.rating', ['id' => $data->id]) }}" method="POST" id="sendComment" enctype="multipart/form-data">
                                                       @csrf
                                                        <textarea name="content" id="" rows="4" placeholder="Mời bạn đánh giá, vui lòng nhập chữ có dấu"></textarea>
                                                        <div class="item">
                                                            <label>Bạn cảm thấy sản phẩm như thế nào?</label>
                                                            <div class="vote" style="display:flex">
                                                                <label for="star1" title="text"><i
                                                                        class="fas fa-star checked"></i></label>
                                                                <input type="radio" id="star1" name="rating"
                                                                    value="1">
                                                                <label for="star2" title="text"><i
                                                                        class="fas fa-star checked"></i></label>
                                                                <input type="radio" id="star2" name="rating"
                                                                    value="2">
                                                                <label for="star3" title="text"><i
                                                                        class="fas fa-star checked"></i></label>
                                                                <input type="radio" id="star3" name="rating"
                                                                    value="3">
                                                                <label for="star4" title="text"><i
                                                                        class="fas fa-star checked"></i></label>
                                                                <input type="radio" id="star4" name="rating"
                                                                    value="4">
                                                                <label for="star5" title="text"><i
                                                                        class="fas fa-star checked"></i></label>
                                                                <input type="radio" id="star5" name="rating"
                                                                    value="5">
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <label>Tên bạn</label>
                                                            <input type="text" name="name" id=""
                                                                class="form-controls">
                                                        </div>
                                                        <div class="item">
                                                            <label>Email</label>
                                                            <input type="email" name="email" id=""
                                                                class="form-controls">
                                                        </div>
                                                        <div class="item_btn">
                                                            <button class="btn_submit" type="submit">
                                                                Gửi đánh giá
                                                            </button>
                                                            <a class="btn_close closeShow">Hủy</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            @foreach($data->stars()->where('active',1)->where('parent_id', 0)->orderBy('created_at')->get() as $com)
                                            <div class="itemcmt">
                                                <div class="name_cmt">
                                                    <div class="avata"></div>
                                                    <div class="name">{{$com->name}}</div>
                                                </div>
                                                <div class="contentcmt">
                                                    {!!$com->content!!}
                                                </div>
                                                <div class="time_trl_cmt">
                                                    <div class="trl">
                                                        <i class="fas fa-comment-dots"></i>
                                                        Trả lời
                                                    </div>
                                                    <span>|</span>
                                                    <div class="time">{{ $com->created_at->format('d/m/Y h:i') }}</div>
                                                </div>
                                                <div class="sumit_commet" style="display: none;">
                                                    <form action="{{ route('product.rating', ['id' => $data->id]) }}" method="POST" id="sendComment" enctype="multipart/form-data">
                                                        @csrf
                                                        <textarea class="textarea" name="content" rows="4" placeholder="Nhập nội dung" style="width:100%"></textarea>
                                                        <div class="fomt_bg">
                                                            <div class="input">
                                                                <input type="hidden" name="parent_id" value="{{$com->id}}">
                                                                <input type="text" name="name" class="inputText" placeholder="Họ tên*" value="" required>
                                                                <input type="email" name="email" class="inputText" placeholder="Email*" required value="">
                                                                <div class="close_comment">
                                                                    <i class="fas fa-times"></i>
                                                                </div>
                                                            </div>
                                                            <button class="btn_commet" type="submit">Gửi bình luận</button>
                                                        </div>
                                                    </form>
                                                </div>

                                               @foreach($com->where('parent_id',$com->id)->where('active',1)->get() as $value)
                                                <div class="cmt_qt">
                                                    <div class="header_cmt_qt">
                                                        {{$value->name}} <span class="note">QTV</span>
                                                    </div>
                                                    <p>{!!$value->content!!}</p>
                                                </div>
                                              @endforeach
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="product-relate">
                                        <div class="title_sp_lienquan">
                                            <h2>Sản phẩm liên quan</h2>
                                        </div>
                                        <div class="row">
                                            @isset($dataRelate)
                                                @if ($dataRelate->count())
                                                    <div class="list-product-card autoplay_height category-slide-1"
                                                        style="width:100%;">
                                                        @foreach ($dataRelate as $product)
                                                            @php
                                                                // $tran=$product->translationsLanguage()->first();
                                                                // $link=$product->slug_full;
                                                            @endphp
                                                            <div class="col-product-item">
                                                                <div class="product-item">
                                                                    <div class="box">
                                                                        <div class="image2">
                                                                            <a href="{{ $product->slug }}">
                                                                                <img src="{{ asset($product->product_img) }}"
                                                                                    alt="{{ $product->name }}">
                                                                                @if ($product->sale)
                                                                                    <span class="sale">
                                                                                        {{ $product->sale . ' %' }}</span>
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                        <div class="content">
                                                                            <h3>
                                                                                <a
                                                                                    href="{{ $product->slug }}">{{ $product->name }}</a>
                                                                            </h3>
                                                                            <div class="box-price">
                                                                                <span class="new-price">Giá:
                                                                                    {{ $product->price_after_sale ? number_format($product->price_after_sale) . ' ' . $unit : 'Liên hệ' }}</span>
                                                                                @if ($product->sale > 0)
                                                                                    <span
                                                                                        class="old-price">{{ number_format($product->price) }}
                                                                                        {{ $unit }}</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-3 col-sm-12 col-xs-12 block-content-left">
                            @isset($sidebar)
                                @include('frontend.components.sidebar',[
                                    "categoryProduct"=>$sidebar['categoryProduct'],
                                    "categoryPost"=>$sidebar['categoryPost'],
                                    'fill'=>true,
                                    'product'=>true,
                                    'post'=>false,
                                    'urlActive'=>makeLink('category_products',$data->category->id,$data->category->slug) ,
                                ])
                            @endisset

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        @csrf
    </form>
    <script type="text/javascript">
    
        $(document).ready(function() {
            $('.autoplay1').slick({
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                speed: 300,
                autoplaySpeed: 3000,
            });
            $('.column').click(function() {
                var src = $(this).find('img').attr('src');
                $(".hrefImg").attr("href", src);
                $("#expandedImg").attr("src", src);
            });
            $('.slide_small').slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });


            $(document).on('click', '.tab-link ul li a', function() {
                $('.tab-link ul li a').removeClass('active');
                $(this).addClass('active');
            });
            $('.autoplay5-product-detail').slick({
                dots: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 551,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            vertical: false,
                        }
                    }
                ]
            });


            // load ajax phaan trang
            $(document).on('click', '.pagination a', function() {
                event.preventDefault();
                let contentWrap = $('#dataProductSearch');
                let href = $(this).attr('href');
                //alert(href);
                $.ajax({
                    type: "Get",
                    url: href,
                    // data: "data",
                    dataType: "JSON",
                    success: function(response) {
                        let html = response.html;

                        contentWrap.html(html);
                    }
                });
            });
        });
    </script>
    <script>
        function cclick() {
            let visibleIndex = -1;
            const review = document.querySelectorAll('.review');
            const btn = document.querySelectorAll('.closeShow');

            btn.forEach((element, index) => {
                element.addEventListener('click', () => {
                    console.log(visibleIndex)
                    if (visibleIndex !== index) {
                        if (visibleIndex >= 0) {
                            review[visibleIndex].style.display = 'none';
                        }
                        review[index].style.display = 'block';
                        visibleIndex = index;
                    } else {
                        review[visibleIndex].style.display = 'none';
                        visibleIndex = -1;
                    }
                });
            });
        }

        cclick();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var boxnumber = $('.box-add-cart input').val();
            parseInt(boxnumber);
            $('.cart_qty_add').click(function() {
                if ($(this).parent().parent().find('input').val() < 50) {
                    var a = $(this).parent().parent().find('input').val(+$(this).parent().parent().find(
                        'input').val() + 1);
                    // let url = $('#addCart').data('start');
                    // url += "?quantity=" + $('#cart_quantity').val();
                    // $('#addCart').attr('data-url',url);
                    $("#optionChange").trigger('change');
                }
            });
            $('.cart_qty_reduce').click(function() {
                if ($(this).parent().parent().find('input').val() > 1) {
                    if ($(this).parent().parent().find('input').val() > 1) $(this).parent().parent().find(
                        'input').val(+$(this).parent().parent().find('input').val() - 1);
                    //  let url = $('#addCart').data('start');
                    // url += "?quantity=" + $('#cart_quantity').val();

                    // $('#addCart').attr('data-url',url);
                    $("#optionChange").trigger('change');
                }
            });
            $(document).on('change', '.optionChange', function() {
                let val = ($(this).val());
                let arrPriceAndId = val.split("-").map(function(value, index) {
                    return parseInt(value);
                });

                var nf = Intl.NumberFormat();

                let text = 'Liên hệ';
                let url = $('#addCart').data('start');
                url += "?quantity=" + $('#cart_quantity').val();
                if (arrPriceAndId[1]) {
                    url += "&option=" + arrPriceAndId[1];
                }
                if (arrPriceAndId[0] > 0) {
                    let price = nf.format(arrPriceAndId[0]);
                    text = price + '<span class="donvi"> đ</span>';
                }
                $('#addCart').attr('data-url', url);
                $('#priceChange').html(text);
            });
        });
    </script>

@endsection
@section('js')
<script>
    function cclickas() {
        var textarea = document.querySelector('.textarea');
        var closeBtn = document.querySelector('.close_comment i');
        var submitComment = document.querySelector('.sumit_commet');

        textarea.addEventListener('click', function() {
            submitComment.style.display = 'block';
        });

        closeBtn.addEventListener('click', function() {
            submitComment.style.display = 'none';
        });
    }
    cclickas();
</script>

<script>
    const nameCmts = document.querySelectorAll('.name_cmt');
    nameCmts.forEach(function(nameCmt) {
        const name = nameCmt.querySelector('.name');
        const firstChar = name.textContent.trim().charAt(0);
        const avata = nameCmt.querySelector('.avata');
        avata.textContent = firstChar;
    });
</script>

<script>
    function footessr() {
        var replyButtons = document.querySelectorAll('.trl');
        replyButtons.forEach((button, index) => {
            var submitForms = document.querySelectorAll('.sumit_commet');
            button.addEventListener('click', () => {
                submitForms[index].style.display = 'block';
            });

            var closeBtns = document.querySelectorAll('.close_comment');
            closeBtns[index].addEventListener('click', (event) => {
                event.preventDefault();
                submitForms[index].style.display = 'none';
            });
        });
    }
    footessr();
</script>
@endsection
