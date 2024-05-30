
<?php $__env->startSection('title', $seo->name); ?>
<?php $__env->startSection('image', asset($seo->image_path)); ?>
<?php $__env->startSection('keywords', $seo->slug); ?>
<?php $__env->startSection('description', $seo->value); ?>
<?php $__env->startSection('abstract', $seo->slug); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <!-- <h1 class="d-none">
                    {h1trangchu}
                </h1>
                <h2 class="d-none">
                    {h2trangchu}
                </h2> -->
            <div class="bg-home">
                <div class="slide">
                    <?php if(isset($slidersM)): ?>
                    <div class="box-slide faded cate-arrows-1 d-none d-md-block">
                        <?php $__currentLoopData = $slidersM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slide">
                            <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="cate_home">
                    <div class="container">
                        <div class="row">
                            <div class="list_cate">
                                <div class="cate_info">
                                    <div class="desc">
                                        <p>Với năng lực sản xuất lâu năm, đội ngũ nhân lực&nbsp;hùng hậu được đào tạo chuyên
                                            sâu, am hiểu trong lĩnh vực nội thất,&nbsp;<strong>Phòng khách hiện đại
                                            </strong>tự tin là đơn vị sản xuất nội thất&nbsp;mang tới&nbsp;cho khách hàng
                                            những phong cách nội thất thẩm mỹ, nâng tầm giá trị cho căn nhà bạn.</p>
                                    </div>
                                    <div class="name">ĐẸP MẮT - ĐỘC ĐÁO</div>
                                    <!-- <div class="line_column"></div> -->
                                </div>
                                <div class="slide_cate cate-dot-1 slick-initialized slick-slider">
                                    <div aria-live="polite" class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 1194px; transform: translate3d(0px, 0px, 0px);"
                                            role="listbox">
                                            <?php $__currentLoopData = $categoryProductHome->childs()->where('active',1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item slick-slide slick-current slick-active" data-slick-index="0"
                                                aria-hidden="false" tabindex="0" role="option"
                                                aria-describedby="slick-slide30" style="width: 199px;">
                                                <a href="<?php echo e(route('product.productByCategory',['slug'=>$item->slug])); ?>" tabindex="0">
                                                    <div class="box">
                                                        <div class="image">
                                                            <img src="<?php echo e($item->avatar_path); ?>"
                                                                alt="<?php echo e($item->name); ?>">
                                                        </div>
                                                        <div class="content">
                                                            <h4><?php echo e($item->name); ?></h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="list_cate list_cate2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-pro-tab-home">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs" id="" role="tablist">
                                    <div class="group-title">
                                        <div class="title title-img">Sản phẩm nổi bật</div>
                                        <div class="img-title">
                                            <img src="https://phongkhachhiendai.com/frontend/images/b.png" alt="">
                                        </div>
                                        <div class="title-b">
                                            <span>
                                                <p>Phòng khách hiện đại là công ty nội thất cao cấp top đầu trong thị trường
                                                    nội thất và trong lòng người tiêu dùng Việt. Phòng khách hiện đại luôn
                                                    đem đến cho khách hàng những sản phẩm nội thất thông minh, cao cấp nhất.
                                                </p>
                                            </span>
                                        </div>
                                    </div>
                                </ul>
                                <div class="tab-content" id="">
                                    <div class="tab-pane fade show active" id="pro-tab-1" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="list-product">
                                            <div class="row">
                                                <?php $__currentLoopData = $productsBest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">

                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a
                                                                    href="<?php echo e(route('product.detail',['slug'=>$item->slug ])); ?>">
                                                                    <img src="<?php echo e(asset($item->product_img)); ?>" alt="<?php echo e($item->name); ?>">
                                                                        <?php if($item->sale): ?>
                                                                        <span class="sale"> <?php echo e($item->sale." %"); ?></span>
                                                                        <?php endif; ?>

                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a
                                                                        href="<?php echo e(route('product.detail',['slug'=>$item->slug ])); ?>">
                                                                        <?php echo e($item->name); ?>

                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <span class="new-price">Giá: <?php echo e($item->price_after_sale?number_format($item->price_after_sale)." ".$unit??'':"Liên hệ"); ?></span>
                                                                    <?php if($item->sale>0): ?>
                                                                        <span class="old-price"><?php echo e(number_format($item->price)); ?> <?php echo e($unit??''); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="free">
                                                                    <img src="https://phongkhachhiendai.com/frontend/images/vanchuyen.png"
                                                                        alt="vanchuyen">Miễn phí vận chuyển toàn quốc
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-banner-home">
                    <div class="item-banner">
                        <a href="">
                            <img src="https://phongkhachhiendai.com/storage/setting/2/giua-trang.jpg"
                                alt="Banner bộ sưu tập">
                        </a>
                    </div>
                </div>
                <div class="wrap-pro-tab-home">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs" id="" role="tablist">
                                    <div class="group-title">
                                        <div class="title title-img">Sản phẩm mới</div>
                                        <div class="img-title">
                                            <img src="https://phongkhachhiendai.com/frontend/images/b.png" alt="">
                                        </div>
                                        <div class="title-b">
                                            <span>
                                                <p>Phòng khách hiện đại mang đến cho quý khách hàng loạt sản phẩm thông
                                                    minh, nhằm tối ưu tiện ích và công năng cho các không gian như: văn
                                                    phòng, chung cư, căn hộ, biệt thự.&nbsp;</p>
                                            </span>
                                        </div>
                                    </div>
                                </ul>
                                <div class="tab-content" id="">
                                    <div class="tab-pane fade show active" id="pro-tab-1" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="list-product">
                                            <div class="row">
                                                <?php $__currentLoopData = $productsNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">

                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a
                                                                    href="<?php echo e(route('product.detail',['slug'=>$item->slug ])); ?>">
                                                                    <img src="<?php echo e(asset($item->product_img)); ?>" alt="<?php echo e($item->name); ?>">
                                                                        <?php if($item->sale): ?>
                                                                        <span class="sale"> <?php echo e($item->sale." %"); ?></span>
                                                                        <?php endif; ?>

                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a
                                                                        href="<?php echo e(route('product.detail',['slug'=>$item->slug ])); ?>">
                                                                        <?php echo e($item->name); ?>

                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <span class="new-price">Giá: <?php echo e($item->price_after_sale?number_format($item->price_after_sale)." ".$unit??'':"Liên hệ"); ?></span>
                                                                    <?php if($item->sale>0): ?>
                                                                        <span class="old-price"><?php echo e(number_format($item->price)); ?> <?php echo e($unit??''); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="free">
                                                                    <img src="https://phongkhachhiendai.com/frontend/images/vanchuyen.png"
                                                                        alt="vanchuyen">Miễn phí vận chuyển toàn quốc
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cam_ket">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="group-title">
                                    <div class="title title-img">Vì sao nên chọn Phòng khách hiện đại?</div>
                                    <div class="img-title">
                                        <img src="https://phongkhachhiendai.com/frontend/images/b.png" alt="">
                                    </div>
                                    <div class="title-b">
                                        <span>
                                            Phòng khách hiện đại xin chân thành cảm ơn các khách hàng đã đồng ý và sẵn sàng
                                            chia sẻ những thông tin và trải nghiệm của mình sau khi đồng hành cùng Phòng
                                            khách hiện đại
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-12">
                                <div class="row">
                                    <div class="list_camket">
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="https://phongkhachhiendai.com/storage/setting/2/ts5.png"
                                                        alt="Thương hiệu uy tín">
                                                </div>
                                                <div class="info">
                                                    <div class="name">Thương hiệu uy tín</div>
                                                    <div class="desc">Với nhiều năm hoạt động trên thị trường nội thất,
                                                        Phòng khách hiện đại tự hào là một trong những nhà cung cấp sản phẩm
                                                        nội thất có thương hiệu hàng đầu Việt Nam.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="https://phongkhachhiendai.com/storage/setting/2/ts.png"
                                                        alt="Chất lượng tốt, đa dạng mẫu mã">
                                                </div>
                                                <div class="info">
                                                    <div class="name">Chất lượng tốt, đa dạng mẫu mã</div>
                                                    <div class="desc">Phòng khách hiện đại đảm bảo có trên 99% khách hàng
                                                        hài lòng với chất lượng sản phẩm của công ty khi sử dụng sản phẩm
                                                        chính hãng do Phòng khách hiện đại cung cấp.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="https://phongkhachhiendai.com/storage/setting/2/ts1.png"
                                                        alt="Đội ngũ nhân viên tâm huyết">
                                                </div>
                                                <div class="info">
                                                    <div class="name">Đội ngũ nhân viên tâm huyết</div>
                                                    <div class="desc">Toàn thể nhân viên của Phòng khách hiện đại luôn nỗ
                                                        lực hết mình để mang đến cho quý khách hàng những sản phẩm chất
                                                        lượng, xem khách hàng như chính người thân của mình.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="https://phongkhachhiendai.com/storage/setting/2/ts2.png"
                                                        alt="Giá cả hợp lý">
                                                </div>
                                                <div class="info">
                                                    <div class="name">Giá cả hợp lý</div>
                                                    <div class="desc">Các sản phẩm của Phòng khách hiện đại cung cấp với
                                                        chất lượng tốt cùng giá cả hợp lý. Đó là lý do mà Phòng khách hiện
                                                        đại lại tồn tại và có uy tín trên thị trường Việt Nam.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="https://phongkhachhiendai.com/storage/setting/2/ts3.png"
                                                        alt="Chính sách chăm sóc khách hàng thông minh">
                                                </div>
                                                <div class="info">
                                                    <div class="name">Chính sách chăm sóc khách hàng thông minh</div>
                                                    <div class="desc">Phòng khách hiện đại cam kết mang đến các chính
                                                        sách bảo hành cũng như chăm sóc khách hàng vô cùng hiệu quả, có
                                                        nhiều ưu đãi dành cho quý khách hàng thân yêu.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="https://phongkhachhiendai.com/storage/setting/2/ts4.png"
                                                        alt="Bảo hành uy tín">
                                                </div>
                                                <div class="info">
                                                    <div class="name">Bảo hành uy tín</div>
                                                    <div class="desc">Phòng khách hiện đại cam kết 1 đổi 1 cho những sản
                                                        phẩm do lỗi của chúng tôi. Bảo hành lên đến 5 năm tùy vào từng dòng
                                                        sản phẩm khác nhau.</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-ykkh">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="group-title">
                                    <div class="title title-img">CẢM NHẬN KHÁCH HÀNG</div>
                                    <div class="img-title">
                                        <img src="https://phongkhachhiendai.com/frontend/images/b.png" alt="">
                                    </div>
                                    <div class="title-b">
                                        <span>
                                            Phòng khách hiện đại xin chân thành cảm ơn các khách hàng đã đồng ý và sẵn sàng
                                            chia sẻ những thông tin và trải nghiệm của mình sau khi đồng hành cùng Phòng
                                            khách hiện đại. Đây là những lời động viên quý giá giúp Phòng khách hiện đại
                                            luôn cố gắng không ngừng để phát triển chất lượng và dịch vụ hơn nữa.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="list-ykkh autoplay4-ykkh category-slide-1 slick-initialized slick-slider">
                                    <button type="button" data-role="none" class="slick-prev slick-arrow"
                                        aria-label="Previous" role="button" style=""><i
                                            class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                    <div aria-live="polite" class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 4290px; transform: translate3d(-1170px, 0px, 0px);"
                                            role="listbox">
                                            <div class="col-ykkh-item slick-slide slick-cloned" data-slick-index="-3"
                                                aria-hidden="true" tabindex="-1" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Chưa một đơn vị kinh doanh nội thất nào khiến tôi hài lòng như
                                                            Phòng khách hiện đại. Tại Phòng khách hiện đại tôi có thể thoải
                                                            mái lựa chọn sản phẩm mà tôi cảm thấy thích thú. Không những vậy
                                                            đội ngũ tư vấn còn cho tôi những lời khuyên rất chân thành, giúp
                                                            tôi mua được bộ sofa cho phòng khách chật hẹp của mình một cách
                                                            toàn vẹn.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd3.jpg"
                                                            alt="Anh Hùng Quang">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Anh Hùng Quang</h2>
                                                        <p>Nhân viên văn phòng</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-cloned" data-slick-index="-2"
                                                aria-hidden="true" tabindex="-1" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Tôi cảm thấy rất hài lòng với chất lượng sản phẩm, mẫu mà, chất
                                                            liệu và màu sắc của sản phẩm sofa của quán cafe chúng tôi đặt
                                                            mua tại Phòng khách hiện đại. Tôi chắc chắn sẽ ủng hộ và giới
                                                            thiệu cho bạn bè và đối tác khi có nhu cầu.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd4.jpg"
                                                            alt="Anh Việt Minh">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Anh Việt Minh</h2>
                                                        <p>Chủ quán cà phê</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-cloned" data-slick-index="-1"
                                                aria-hidden="true" tabindex="-1" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Tôi rất hài lòng với bộ ghế sofa văn phòng do Phòng khách hiện
                                                            đại cung cấp, đúng như yêu cầu mẫu mã, kích thước, và chất liệu
                                                            tốt. Đặc biệt nhân viên tư vấn của Phòng khách hiện đại rất có
                                                            trách nhiệm, tư vấn giúp chúng tôi những thông tin cơ bản mà nội
                                                            thất cần thiết, giúp văn phòng chúng tôi ngày một đẹp đẽ hơn.
                                                        </p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd.jpg"
                                                            alt="Chị Trúc Như">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Chị Trúc Như</h2>
                                                        <p>Giám đốc</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-current slick-active"
                                                data-slick-index="0" aria-hidden="false" tabindex="0" role="option"
                                                aria-describedby="slick-slide20" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Trước khi về nhà mới, tôi cũng đã tìm kiếm nhiều nơi để mua sản
                                                            phẩm nội thất. Nhưng rất khó bởi mẫu nào mình ưa về thiết kế thì
                                                            lại không ưng chất liệu. Được bạn bè giới thiệu nên tôi đã chọn
                                                            Phòng khách hiện đại và tôi rất hài lòng về chất lượng, mẫu mã
                                                            cũng như sự tận tình của đội ngũ nhân viên &nbsp;Phòng khách
                                                            hiện đại.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd1.jpg"
                                                            alt="Chị Mai Lan">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Chị Mai Lan</h2>
                                                        <p>Nhân Viên Văn Phòng</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-active" data-slick-index="1"
                                                aria-hidden="false" tabindex="0" role="option"
                                                aria-describedby="slick-slide21" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Về giá thành các mẫu sofa hiện đại đẹp thì bạn không cần suy nghĩ
                                                            nhiều khi chọn Phòng khách hiện đại. Bởi lẽ đây là địa chỉ cung
                                                            cấp các mẫu sofa chất lượng cao, giá cả hợp lý với túi tiền
                                                            người tiêu dùng. Do đó khách hàng hoàn toàn yên tâm khi muốn có
                                                            cho mình một bộ sofa đẹp như mong đợi khi tới với Phòng khách
                                                            hiện đại.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd2.jpg"
                                                            alt="Chị Lan Ngọc">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Chị Lan Ngọc</h2>
                                                        <p>Chủ shop thời trang</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-active" data-slick-index="2"
                                                aria-hidden="false" tabindex="0" role="option"
                                                aria-describedby="slick-slide22" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Chưa một đơn vị kinh doanh nội thất nào khiến tôi hài lòng như
                                                            Phòng khách hiện đại. Tại Phòng khách hiện đại tôi có thể thoải
                                                            mái lựa chọn sản phẩm mà tôi cảm thấy thích thú. Không những vậy
                                                            đội ngũ tư vấn còn cho tôi những lời khuyên rất chân thành, giúp
                                                            tôi mua được bộ sofa cho phòng khách chật hẹp của mình một cách
                                                            toàn vẹn.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd3.jpg"
                                                            alt="Anh Hùng Quang">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Anh Hùng Quang</h2>
                                                        <p>Nhân viên văn phòng</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide" data-slick-index="3"
                                                aria-hidden="true" tabindex="-1" role="option"
                                                aria-describedby="slick-slide23" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Tôi cảm thấy rất hài lòng với chất lượng sản phẩm, mẫu mà, chất
                                                            liệu và màu sắc của sản phẩm sofa của quán cafe chúng tôi đặt
                                                            mua tại Phòng khách hiện đại. Tôi chắc chắn sẽ ủng hộ và giới
                                                            thiệu cho bạn bè và đối tác khi có nhu cầu.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd4.jpg"
                                                            alt="Anh Việt Minh">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Anh Việt Minh</h2>
                                                        <p>Chủ quán cà phê</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide" data-slick-index="4"
                                                aria-hidden="true" tabindex="-1" role="option"
                                                aria-describedby="slick-slide24" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Tôi rất hài lòng với bộ ghế sofa văn phòng do Phòng khách hiện
                                                            đại cung cấp, đúng như yêu cầu mẫu mã, kích thước, và chất liệu
                                                            tốt. Đặc biệt nhân viên tư vấn của Phòng khách hiện đại rất có
                                                            trách nhiệm, tư vấn giúp chúng tôi những thông tin cơ bản mà nội
                                                            thất cần thiết, giúp văn phòng chúng tôi ngày một đẹp đẽ hơn.
                                                        </p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd.jpg"
                                                            alt="Chị Trúc Như">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Chị Trúc Như</h2>
                                                        <p>Giám đốc</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-cloned" data-slick-index="5"
                                                aria-hidden="true" tabindex="-1" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Trước khi về nhà mới, tôi cũng đã tìm kiếm nhiều nơi để mua sản
                                                            phẩm nội thất. Nhưng rất khó bởi mẫu nào mình ưa về thiết kế thì
                                                            lại không ưng chất liệu. Được bạn bè giới thiệu nên tôi đã chọn
                                                            Phòng khách hiện đại và tôi rất hài lòng về chất lượng, mẫu mã
                                                            cũng như sự tận tình của đội ngũ nhân viên &nbsp;Phòng khách
                                                            hiện đại.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd1.jpg"
                                                            alt="Chị Mai Lan">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Chị Mai Lan</h2>
                                                        <p>Nhân Viên Văn Phòng</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-cloned" data-slick-index="6"
                                                aria-hidden="true" tabindex="-1" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Về giá thành các mẫu sofa hiện đại đẹp thì bạn không cần suy nghĩ
                                                            nhiều khi chọn Phòng khách hiện đại. Bởi lẽ đây là địa chỉ cung
                                                            cấp các mẫu sofa chất lượng cao, giá cả hợp lý với túi tiền
                                                            người tiêu dùng. Do đó khách hàng hoàn toàn yên tâm khi muốn có
                                                            cho mình một bộ sofa đẹp như mong đợi khi tới với Phòng khách
                                                            hiện đại.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd2.jpg"
                                                            alt="Chị Lan Ngọc">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Chị Lan Ngọc</h2>
                                                        <p>Chủ shop thời trang</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-ykkh-item slick-slide slick-cloned" data-slick-index="7"
                                                aria-hidden="true" tabindex="-1" style="width: 390px;">
                                                <div class="item-ykkh">
                                                    <div class="nd_ykien">
                                                        <p>Chưa một đơn vị kinh doanh nội thất nào khiến tôi hài lòng như
                                                            Phòng khách hiện đại. Tại Phòng khách hiện đại tôi có thể thoải
                                                            mái lựa chọn sản phẩm mà tôi cảm thấy thích thú. Không những vậy
                                                            đội ngũ tư vấn còn cho tôi những lời khuyên rất chân thành, giúp
                                                            tôi mua được bộ sofa cho phòng khách chật hẹp của mình một cách
                                                            toàn vẹn.</p>
                                                    </div>
                                                    <div class="box">
                                                        <img src="https://phongkhachhiendai.com/storage/setting/2/gd3.jpg"
                                                            alt="Anh Hùng Quang">
                                                    </div>
                                                    <div class="box_right">
                                                        <h2>Anh Hùng Quang</h2>
                                                        <p>Nhân viên văn phòng</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <button type="button" data-role="none" class="slick-next slick-arrow"
                                        aria-label="Next" role="button" style=""><i class="fa fa-chevron-right"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parallax-section2"></div>

                <div class="wrap-post-home wow fadeInUp" >
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="group-title">
                                    <div class="title title-img">Tin tức nổi bật</div>
                                    <div class="img-title">
                                        <img src="https://phongkhachhiendai.com/frontend/images/b.png" alt="icon">
                                    </div>
                                    <div class="title-b">
                                        <span>
                                            <p>Cập nhật những tin tức, sự kiện nóng nhất xung quanh vấn đề&nbsp;sản phẩm nội
                                                thất được bạn đọc quan tâm nhất.</p>
                                        </span>
                                    </div>
                                </div>

                                <div class="list-post-home tin-tuc-home category-slide-1 category-slide-2">
                                    <?php if(isset($postsHot)&& $postsHot): ?>
                                    <?php $__currentLoopData = $postsHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="item-post">
                                        <div class="box">
                                         <div class="image">
                                             <a href="<?php echo e(route('post.detail',['slug'=>$post->slug])); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                                             <div class="info">
                                                 <span><?php echo e(date_format($post->created_at,'d/m/Y')); ?></span>
                                             </div>
                                         </div>
                                         <div class="content">
                                             <div class="name"><a href="<?php echo e(route('post.detail',['slug'=>$post->slug])); ?>"><?php echo e($post->name); ?></a></div>
                                             <div class="desc">
                                                 <?php echo $post->description; ?>

                                             </div>
                                             <div class="text-left">
                                                <a href="<?php echo e(route('post.detail',['slug'=>$post->slug])); ?>" class="link-detail">Chi tiết <i class="fas fa-long-arrow-alt-right"></i></a>
                                             </div>
                                         </div>
                                        </div>
                                     </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <?php if(isset($modalHome) && $modalHome): ?>
            <div class="modal fade modal-First" id="modal-first" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" image="">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                
                            </button>

                            <div class="image-modal">
                                <div class="image">
                                    <img src="<?php echo e(asset($modalHome->image_path)); ?>" alt="">
                                </div>
                                <div class="newsletter-content">
                                    
                                    <h2><?php echo e($modalHome->name); ?></h2>
                                    <div class="dec"><?php echo $modalHome->description; ?></div>
                                    <form action="<?php echo e(route('contact.storeAjax')); ?>"
                                        data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit"
                                        data-target="alert" data-href="#modalAjax" data-content="#content"
                                        data-method="POST" method="POST"
                                        class="input-wrapper input-wrapper-inline input-wrapper-round">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Họ tên *">
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Số điện thoại *" required>
                                        <input type="text" class="form-control" name="content"
                                            placeholder="Sản phẩm mua *" required>
                                        <button>Đăng ký ngay <i class="fas fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function() {
            $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
                $('.autoplay4-pro').slick('setPosition');
            });
        });

        setTimeout(() => $('#modal-first').modal('show'), 10000);
    </script>
    <script>
        $(function() {
            var now = new Date();
            var date = now.getDate();
            var month = (now.getMonth() + 1);
            var year = now.getFullYear();
            var timer;
            var then = year + '/' + month + '/' + date + ' 23:59:59';
            var now = new Date();
            var compareDate = new Date(then) - now.getDate();
            timer = setInterval(function() {
                timeBetweenDates(compareDate);
            }, 1000);

            function timeBetweenDates(toDate) {
                var dateEntered = new Date(toDate);
                var now = new Date();
                var difference = dateEntered.getTime() - now.getTime();
                if (difference <= 0) {
                    clearInterval(timer);
                } else {
                    var seconds = Math.floor(difference / 1000);
                    var minutes = Math.floor(seconds / 60);
                    var hours = Math.floor(minutes / 60);
                    var days = Math.floor(hours / 24);
                    hours %= 24;
                    minutes %= 60;
                    seconds %= 60;
                    $("#days").text(days);
                    $("#hours").text(hours);
                    $("#minutes").text(minutes);
                    $("#seconds").text(seconds);
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan101198\resources\views/page/home.blade.php ENDPATH**/ ?>