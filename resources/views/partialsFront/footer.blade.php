

    {{-- <div class="wrap-bg wow fadeInUp" style="background-image: url('{{ asset ($footer['banner_shipping']->image_path) }}');">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box-bg">
                        <img src="{{ asset ($footer['banner_giua']->image_path) }}" alt="Image">
                        <div class="d-flex box-bg-content">
                            <div class="logo-bg">
                                <img src="{{ asset ($footer['logo_banner_shipping']->image_path) }}" alt="Logo">
                            </div>
                            <div class="button_tuvan">
                                <a href="{{makeLinkToLanguage('bao-gia',null,null,App::getLocale())}}" class="btn-view"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{$footer['nhan_tu_van']->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="wrap-partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="list-item autoplay5-doitac category-slide-1">

                        @if ($footer['doitac'])
                        @foreach ($footer['doitac']->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)
                        <div class="item">
                            <div class="box">
                                <a href=""><img src="{{ $item->image_path }}" alt="{{ $item->name }}"></a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="dangky_cuoitrang">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                                        <div class="box_info">
                        <div class="title">
                            Đăng ký thông tin
                        </div>
                        <div class="giam">
                            <p>Được giảm giá khuyến mại và kèm các quà tặng cao cùng miễn phí vận chuyển toàn quốc</p>
                        </div>
                    </div>
                                        <div class="box_form_dky">
                        <form action="https://phongkhachhiendai.com/contact/store-ajax" data-url="https://phongkhachhiendai.com/contact/store-ajax" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                            <input type="hidden" name="_token" value="3uIBBhPPlX4mghCAK9bUOEz9WgKNDXFzy2BhzaJK">                            <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại của bạn!" required="">
                            <button name="submit">Gửi <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                        <div class="box-footer-main-info">
                                                        <div class="logo-footer">
                                <a href="https://phongkhachhiendai.com"><img src="https://phongkhachhiendai.com/storage/setting/2/pkhd_1_1.png" alt="Logo footer"></a>
                            </div>
                            <div class="luxury">
                                Living Room - Phòng khách hiện đại
                            </div>

                                <div class="content-address-footer">

                                </div>
                                <div class="list-address-footer">
                                    <ul>
                                                                                    <li>
                                                <strong>Địa chỉ</strong>
                                                <span>: Số 486 Xuân Đỉnh, Bắc Từ Liêm, Hà Nội</span>
                                            </li>
                                                                                    <li>
                                                <strong>Hotline</strong>
                                                <span>: 083 786 1166</span>
                                            </li>
                                                                                    <li>
                                                <strong>Email</strong>
                                                <span>: info@phongkhachhiendai.com</span>
                                            </li>
                                                                                    <li>
                                                <strong>Website</strong>
                                                <span>: www.phongkhachhiendai.com</span>
                                            </li>
                                                                            </ul>
                                </div>
                                                    </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                    Danh mục sản phẩm
                                </div>
                                <div class="list-link-footer">
                                    <ul class="footer-link">
                                                                                                                        <li><a href="https://phongkhachhiendai.com/ke-tivi">Kệ tivi</a></li>
                                                                                <li><a href="https://phongkhachhiendai.com/ban-tra">Bàn trà</a></li>
                                                                                <li><a href="https://phongkhachhiendai.com/tu-tho">Tủ thờ</a></li>
                                                                                <li><a href="https://phongkhachhiendai.com/ghe-sofa">Ghế Sofa</a></li>
                                                                                <li><a href="https://phongkhachhiendai.com/phu-kien-phong-khach">Phụ kiện phòng khách</a></li>
                                                                                <li><a href="https://phongkhachhiendai.com/bo-suu-tap">Bộ sưu tập</a></li>
                                                                                                                    </ul>
                                </div>
                            </div>

                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                                    <div class="title-footer">
                                    Hỗ trợ khách hàng
                                    </div>
                                    <div class="list-link-footer">
                                        <ul class="footer-link">
                                                                                            <li><a href="https://phongkhachhiendai.com/tin-tuc/chinh-sach-van-chuyen">Chính sách vận chuyển</a></li>
                                                                                            <li><a href="https://phongkhachhiendai.com/tin-tuc/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                                                                                            <li><a href="https://phongkhachhiendai.com/tin-tuc/chinh-sach-lap-dat-toan-quoc">Chính sách lắp đặt toàn quốc</a></li>
                                                                                            <li><a href="https://phongkhachhiendai.com/tin-tuc/chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
                                                                                            <li><a href="https://phongkhachhiendai.com/tin-tuc/chinh-sach-thanh-toan">Chính sách thanh toán</a></li>
                                                                                            <li><a href="https://phongkhachhiendai.com/tin-tuc/chinh-sach-doi-tra">Chính sách đổi trả</a></li>
                                                                                    </ul>
                                    </div>
                                </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-item-footer">
                                <div class="title-footer">
                                    Kết nối với chúng tôi
                                </div>

                                <ul class="pt_social">
                                                                                                                        <li>
                                                <a href="https://www.facebook.com/" target="blank" rel="noopener noreferrer">
                                                                                                        <i class="fab fa-facebook-f"></i>
                                                                                                    </a>
                                            </li>
                                                                                    <li>
                                                <a href="https://twitter.com/" target="blank" rel="noopener noreferrer">
                                                                                                        <i class="fab fa-twitter"></i>
                                                                                                    </a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.youtube.com/" target="blank" rel="noopener noreferrer">
                                                                                                        <i class="fab fa-youtube"></i>
                                                                                                    </a>
                                            </li>
                                                                                    <li>
                                                <a href="https://zalo.me/0837861166" target="blank" rel="noopener noreferrer">
                                                                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/zalo.png" alt="Zalo">
                                                                                                    </a>
                                            </li>
                                                                                    <li>
                                                <a href="https://m.me/Ten_fanpage" target="blank" rel="noopener noreferrer">
                                                                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/mes.png" alt="Messenger">
                                                                                                    </a>
                                            </li>
                                                                                                            </ul>


                                                                <div class="fy">
                                    <span class="a">Trung tâm bảo hành toàn quốc</span>
                                    <span class="b"><b>083 786 1166</b> (8h00 - 20h00)</span>
                                </div>
                                																<div class="maps_footer">
									<p><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.946350088613!2d105.78632721440812!3d21.07480489158189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aace851ee091%3A0xba22e00a572180e3!2zNDg2IMSQLiBYdcOibiDEkOG7iW5oLCBYdcOibiDEkOG7iW5oLCBUw6J5IEjhu5MsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1662360234603!5m2!1svi!2s" width="600" height="450" allowfullscreen="allowfullscreen" loading="lazy"></iframe></p>
								</div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="coppy-right">
                                                      Copyright © 2022 PHÒNG KHÁCH HIỆN ĐẠI. All rights reserved.
                                                   </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="back_to_top" id="back-to-top">
                            <a onclick="topFunction();">
                                <span>Về đầu trang</span>
                                <img src="https://phongkhachhiendai.com/frontend/images/icon_back_to_top.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade form-tv" id="modal-form-dky" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
        <div class="modal-body">
            <form action=""  data-url="" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
               @csrf
                <input type="hidden" name="title" value="Đăng ký tư vấn">
                <div class="box-content-form">
                    <h4 class="modal-title">
                        <a href=""><img src=""></a>
                    </h4>
                    <div class="title-form-m">
                        Đăng ký tư vấn
                    </div>
                    <div class="title-form-sm">
                        Liên hệ với chúng tôi để được hỗ trợ
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="name" placeholder="Họ tên">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="content" placeholder="Nội dung tư vấn">
                    </div>
                    <button type="submit">Gửi đi</button>
                    <div class="text-center">
                        <a class="close-form-modal" data-dismiss="modal" aria-label="Close">Đóng lại X</a>
                    </div>
                    {{-- <div class="text">
                        Chúng tôi sẽ gọi lại cho quý khách hàng ngay khi nhận được thông tin quý khách hàng gửi.
                    </div> --}}
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
</div>


<div class="pt_contact_vertical">
    <div class="contact-mobile">
                <div class="contact-item">
            <a class="contact-icon zalo" title="zalo" href="https://zalo.me/0961827564" target="_blank" rel="noopener noreferrer">
                <img src="https://phongkhachhiendai.com/frontend/images/zalo-icon.png" alt="icon">
            </a>
        </div>

                <div class="contact-item">
            <a class="contact-icon fb-mess" title="facebook" href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="https://phongkhachhiendai.com/frontend/images/facebook-icon.png" alt="icon">
            </a>
        </div>
                <div class="clearfix"></div>
    </div>
</div>

<div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
    <div class="tel_phone">
        <a href="tel:0393034189">0961827564</a>
    </div>

    <a href="tel:0393034189">
        <div class="quick-alo-ph-circle"></div>
        <div class="quick-alo-ph-circle-fill"></div>
        <div class="quick-alo-ph-img-circle"></div>
    </a>


</div>
{{-- <div class="back_to_top hidden-xs" id="back-to-top">
    <a onclick="topFunction();">
        <span>Về đầu trang</span>
        <img src="{{ asset('frontend/images/icon_back_to_top.png') }}">
    </a>
</div>
<div class="contact_fixed">
    <li><a href="tel:"><i class="fa fa-phone"></i></a></li>
    <li>
        <a href="https://zalo.me/{{ $footer['hotline']->value }}"><img src="{{ asset('frontend/images/zalo2.png') }}" alt="Zalo"></a>
    </li>
    <li>
        <a href="https://m.me/"><img src="{{ asset('frontend/images/messenger2.png') }}" alt="Messenger"></a>
    </li>
    <li>
        <a onclick="topFunction();" href="javascript:;"><img src="{{ asset('frontend/images/icon_back_to_top.png') }}" alt="Back to top"></a>
    </li>
</div> --}}



<script>
$(document).on('submit', "[data-ajax='submit']", function() {
    let myThis = $(this);
    let formValues = $(this).serialize();
    let dataInput = $(this).data();

    // Kiểm tra định dạng số điện thoại
    let phoneInput = myThis.find('input[name="phone"]');
    let phoneNumber = phoneInput.val().trim();
    let phoneRegex = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;
    if (!phoneRegex.test(phoneNumber)) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Vui lòng nhập số điện thoại hợp lệ.',
            showConfirmButton: false,
            timer: 1500
        });
        return false;
    }

    $.ajax({
        type: dataInput.method,
        url: dataInput.url,
        data: formValues,
        dataType: "json",
        success: function(response) {
            if (response.code == 200) {
                myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val('');
                if (dataInput.content) {
                    $(dataInput.content).html(response.html);
                }
                if (dataInput.target) {
                    switch (dataInput.target) {
                        case 'modal':
                            $(dataInput.href).modal();
                            break;
                        case 'alert':
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.html,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            break;
                        default:
                            break;
                    }
                }
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: response.html,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
        error: function(response) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
    return false;
});

    </script>



