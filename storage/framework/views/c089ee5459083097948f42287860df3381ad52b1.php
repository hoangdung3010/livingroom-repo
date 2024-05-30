<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
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
                                    <li class="breadcrumbs-item active"><a href="" class="currentcat">Liên hệ</a></li>
                                    
                                </ul>
                        </div>
                    </div>
                </div>
         </div>
            <div class="wrap-content-main wrap-template-contact template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-form">

                                <div class="form" >

                                    <p>Quý khách vui lòng điền đầy đủ các thông tin vào các ô dưới đây để gửi thông tin đến chúng tôi !</p>
                                    <form  action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" placeholder="Họ và tên" required="required" name="name">
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required="required" name="email">
                                        <input type="tel" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" placeholder="Số điện thoại" required="required" name="phone">
                                        <textarea name="content" placeholder="Thông tin thêm" id="noidung" cols="30" rows="5"></textarea>
                                        <button class="hvr-float-shadow"  >Gửi thông tin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-infor">
                                <div class="infor">
                                                                            <div class="address">
                                            <div class="footer-layer">
                                                <div class="title">
                                                PHÒNG KHÁCH HIỆN ĐẠI
                                                </div>
                                                <ul class="pt_list_addres">
                                                                                                <li><i class="fas fa-home"></i> Số 486 Xuân Đỉnh, Bắc Từ Liêm, Hà Nội</li>
                                                                                                <li><i class="fa fa-phone" aria-hidden="true"></i> 083 786 1166</li>
                                                                                                <li><i class="fa fa-envelope" aria-hidden="true"></i> info@phongkhachhiendai.com</li>
                                                                                                <li><i class="fa fa-globe" aria-hidden="true"></i> www.phongkhachhiendai.com</li>

                                                </ul>
                                            </div>
                                        </div>
                                                                                                                <div class="map">
                                            <p><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.946350088613!2d105.78632721440812!3d21.07480489158189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aace851ee091%3A0xba22e00a572180e3!2zNDg2IMSQLiBYdcOibiDEkOG7iW5oLCBYdcOibiDEkOG7iW5oLCBUw6J5IEjhu5MsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1662360234603!5m2!1svi!2s" width="600" height="450" allowfullscreen="allowfullscreen" loading="lazy"></iframe></p>
                                        </div>
                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="modalAjax">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết đơn hàng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             <div class="content" id="content">

             </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>

        // ajax load form
        $(document).on('submit',"[data-ajax='submit']",function(){
            let formValues = $(this).serialize();
            let dataInput=$(this).data();
            // dataInput= {content: "#content", href: "#modalAjax", target: "modal", ajax: "submit", url: "http://127.0.0.1:8000/contact/store-ajax"}

            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function (response) {
                    if(response.code==200){
                        if(dataInput.content){
                            $(dataInput.content).html(response.html);
                        }
                        if(dataInput.target){
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
                                default:
                                    break;
                            }
                        }
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.html,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                   // console.log( response.html);
                },
                error:function(response){
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan101198\resources\views/page/contact.blade.php ENDPATH**/ ?>