@extends('layouts.main')
@section('title', 'Trang chủ')
@section('css')
   <style>
       .btn-light{
        color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    background-color: #a3a3a3;
       }
       .content-colsap li {
    display: flex;
    flex-wrap: wrap;
    /* justify-content: space-around; */
    margin-bottom: 15px;
}
.input-check {
    padding: 15px;
}
.checkbox-round:checked {
    background-color: yellow;
}
.content-colsap li .image {
    width: 60px;
    margin-right: 16px;
    border-radius: 10px;
    overflow: hidden;
    height: 60px;
}
.content-colsap li .image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.content-colsap .desc {
    display: inline-block;
}
.content-colsap .desc h3 {
    font-size: 18px;
    font-weight: 600;
    margin-top: 0;
    margin-bottom: 4px;
}
   </style>
@endsection



@section('content')
    <div class="content-wrapper">
        <div class="main">
            <div class="text-left wrap-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="">Trang chủ</a>
                                </li>
                                <li class="breadcrumbs-item active"><a href="#" class="currentcat">Giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-cart">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-danger">
                            @include('page.cart-component',[
                            ])
                        </div>
                        <div class="bg-cart">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-buy">
                                        <form action="{{ route('cart.order.submit') }}" method="POST" enctype="multipart/form-data" id="myForm" id="buynow">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                                    <h2 class="title-cart">
                                                        Thông tin khách hàng
                                                     </h2>

                                                     <div class="form-group row">
                                                        <label for="" class="col-sm-3">Họ và tên <strong>*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control   @error('name')is-invalid   @enderror" id="" name="name" placeholder="Họ và tên">
                                                        </div>

                                                        <div class="col-sm-12">
                                                            @error('name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                      </div>
                                                      {{--<div class="form-group row">
                                                            <label for="" class="col-sm-3">Email <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control  @error('email')is-invalid   @enderror" id="" name="email" placeholder="Email">
                                                            </div>

                                                            <div class="col-sm-12">
                                                                @error('email')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                       </div>--}}
                                                       <div class="form-group row">
                                                            <label for="" class="col-sm-3">Số điện thoại <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input type="tel" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" required="required" class="form-control   @error('phone')is-invalid   @enderror" id="phone" name="phone" placeholder="Số điện thoại">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                @error('phone')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-3">Tỉnh/TP <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select name="city_id" id="city" class="form-control @error('city_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.districts') }}" required="required">
                                                                    <option value="">Chọn tỉnh/Thành phố</option>
                                                                    {!! $cities !!}
                                                                </select>
                                                            </div>

                                                           <div class="col-sm-12">
                                                                @error('city_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                           </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-3">Quận/huyện <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select name="district_id" id="district" class="form-control    @error('district_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.communes') }}"  required="required">
                                                                    <option value="">Chọn quận/huyện</option>
                                                                </select>
                                                            </div>

                                                            @error('district_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-3">Xã/phường <strong>*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select name="commune_id" id="commune" class="form-control   @error('commune_id')is-invalid   @enderror"  required="required">
                                                                    <option value="">Chọn xã/phường/thị trấn</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                @error('commune_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-3">Địa chỉ cụ thể </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="address_detail" class="form-control    @error('address_detail')is-invalid   @enderror" id="" placeholder="Địa chỉ cụ thể">
                                                            </div>
                                                            @error('address_detail')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-3">Yêu cầu khác </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="note" class="form-control   @error('note')is-invalid   @enderror" id="" placeholder="Yêu cầu khác (không bắt buộc)">
                                                            </div>

                                                           <div class="col-sm-12">
                                                                @error('note')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                           </div>
                                                        </div>
                                                        <div class="group-btn">
                                                            <button type="submit" class="btn btn-primary">Hoàn tất đơn hàng</button>
                                                        </div>
                                                </div>
                                                <div class="col-md-6 ol-sm-12 col-xs-12 col-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 col-12">

                                                            @if (isset($vanchuyen)&&$vanchuyen)
                                                            <h2 class="title-cart">
                                                               {{ $vanchuyen->name }}
                                                             </h2>
                                                              <div class="desc-collapse">
                                                                {!!  $vanchuyen->description !!}
                                                              </div>
                                                              @endif
                                                              <h2 class="title-cart">
                                                                {{ $thanhtoan->name }}
                                                               </h2>
                                                               @if (isset($thanhtoan)&&$thanhtoan)
                                                               <input type="hidden"  name="httt" id="hinhthuc" required value="{{ optional($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->first())->id }}">
                                                               @endif
                                                              <div id="list-thanhtoan">
                                                                  @if (isset($thanhtoan)&&$thanhtoan)
                                                                      @foreach ($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)

                                                                      <div class="card colsap @if ($loop->first) active @endif" data-value='{{ $item->id }}'>
                                                                        <div class="card-header btn-colsap @if ($loop->first) active @endif">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                        <div class="card-body content-colsap">
                                                                            @isset($item)
                                                                            @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $child)
                                                                            <li>
                                                                                <div class="input-check">
                                                                                    <input type="radio" name="cn" value="{{$child->id}}" class="checkbox-round">
                                                                                </div>
                                                                                @if($child->image_path)
                                                                                    <div class="image">
                                                                                        <img src="{{asset($child->image_path)}}" alt="">
                                                                                    </div>
                                                                                @endif
                                                                                <div class="desc">
                                                                                    <h3>{{$child->name}}</h3>
                                                                                    <p>{{$child->value}}</p>
                                                                                </div>
                                                                            </li>
                                                                            @endforeach
                                                                            <li>Lưu ý khi chuyển khoản: Nội dung chuyển khoản ghi rõ tên hoặc số điện thoại</li>
                                                                        @endisset
                                                                        </div>
                                                                    </div>
                                                                      @endforeach
                                                                  @endif
                                                             </div>
                                                        </div>
                                                        {{-- <div class="col-md-6 col-sm-12 col-xs-12 col-12">

                                                            <select name="cn" id="chinhanh" class="form-control" required>
                                                                <option value="0">Chọn chi nhánh *</option>
                                                                @if (isset($chinhanh)&&$chinhanh)
                                                                    @foreach ($chinhanh->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <div class="list-chinhanh">
                                                                @if (isset($chinhanh)&&$chinhanh)
                                                                    @foreach ($chinhanh->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)
                                                                    <div class="item" id="cn_{{ $item->id }}">
                                                                        <div class="name">{{ $item->name }}</div>
                                                                        <div class="diachi">
                                                                           {!! $item->description !!}
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="group-btn">
                                                                <a href="{{ route('home.index') }}" class="btn btn-light">Tiếp tục mua hàng</a>
                                                                <button type="submit" class="btn btn-primary">Gửi đơn hàng</button>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
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
@endsection

@section('js')
<script src="{{ asset('frontend/js/load-address.js') }}"></script>

<script>
    // Lấy đối tượng form và trường số điện thoại
var form = document.getElementById('myForm');
var phoneInput = document.getElementById('phone');

// Xử lý sự kiện khi form được gửi đi
form.addEventListener('submit', function(event) {
    // Ngăn chặn hành vi mặc định của form (chẳng hạn, refresh trang)
    event.preventDefault();

    // Lấy giá trị số điện thoại từ trường nhập
    var phoneNumber = phoneInput.value.trim();

    // Biểu thức chính quy để kiểm tra định dạng số điện thoại
    var phoneRegex = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;

    // Kiểm tra xem số điện thoại có đúng định dạng hay không
    if (phoneRegex.test(phoneNumber)) {
        // Số điện thoại hợp lệ, tiến hành gửi form
        form.submit();
    } else {
        // Số điện thoại không hợp lệ, hiển thị thông báo lỗi
        alert('Vui lòng nhập số điện thoại hợp lệ.');
    }
});

    $(document).on('click','.btn-colsap',function(){
        $('#list-thanhtoan').find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent('.colsap').addClass('active');
        let value= $(this).parent('.colsap.active').data('value');
        $('#hinhthuc').val(value);
        console.log(value);
        $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
            $(this).parent('.colsap.active').find('.content-colsap').slideDown();
    });
    $("#chinhanh").change(function () {
        var id = $(this).val();
        if (id != "0") {
            $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
        }
        else
            $(".list-chinhanh .item").removeClass("active");
    });
</script>
@endsection
