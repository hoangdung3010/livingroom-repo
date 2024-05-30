<?php $__env->startSection('title', $seo['title'] ?? ''); ?>
<?php $__env->startSection('keywords', $seo['keywords'] ?? ''); ?>
<?php $__env->startSection('description', $seo['description'] ?? ''); ?>
<?php $__env->startSection('abstract', $seo['abstract'] ?? ''); ?>
<?php $__env->startSection('image', $seo['image'] ?? ''); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            
            <div class="text-left wrap-breadcrumbs">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="<?php echo e(route('home.index')); ?>">Trang chủ</a>
                                </li>
                                <li class="breadcrumbs-item"><a href="https://phongkhachhiendai.com/san-pham"
                                        class="currentcat">Sản phẩm</a></li>
                                <li class="breadcrumbs-item active"><a href="<?php echo e($category->slug); ?>"
                                        class="currentcat"><?php echo e($category->name); ?></a></li>
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
                            <div class="title title-img"><?php echo e($category->name); ?></div>
                        </div>
                        <div class="wrap-fill">

                            <?php
                                $categoryPModel = new App\Models\Category();
                                $listCategoryProduct = $categoryPModel
                                    ->where('parent_id', $category->parent_id)
                                    ->orderby('order')
                                    ->latest()
                                    ->get();
                            ?>
                            <div class="form-group">
                                <select name="" class="form-control field-change-link">
                                    
                                    <?php $__currentLoopData = $listCategoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($categoryItem->id == $category->id ? '' : $categoryItem->slug); ?>"
                                            <?php echo e($categoryItem->id == $category->id ? 'selected' : ''); ?>><?php echo e($categoryItem->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select form="formfill" class="form-control field-form" name="price">
                                    <option value="">Giá</option>
                                    <?php $__currentLoopData = $priceSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <option value="<?php echo e($item['value']); ?>"
                                            <?php echo e($item['value'] == ($priceS ?? '') ? 'selected' : ''); ?>>
                                            <?php echo e($item['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="orderby" id="" class="form-control field-form" form="formfill">
                                    <option value="0">Sắp sếp theo</option>
                                    <option value="1">Giá tăng dần</option>
                                    <option value="2">Giá giảm dần</option>
                                    
                                </select>
                            </div>
                        </div>

                        
                        <?php if(isset($data)): ?>
                            <div class="wrap-list-product" id="dataProductSearch">
                                <div class="list-product-card">
                                    <div class="row">
                                        <?php if(isset($data) && $data): ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $tran = $product->first();
                                                    $link = $product->slug ?? '';
                                                ?>
                                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e(route('product.detail', ['slug' => $product->slug])); ?>">
                                                                    <img src="<?php echo e(asset($product->product_img)); ?>"
                                                                        alt="<?php echo e($product->name); ?>">
                                                                    <?php if($product->sale): ?>
                                                                        <span class="sale"> <?php echo e($product->sale . ' %'); ?></span>
                                                                    <?php endif; ?>

                                                                    <?php if($product->baohanh): ?>
                                                                        <div class="km">
                                                                            <?php echo e($product->baohanh); ?>

                                                                        </div>
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3>
                                                                    <a
                                                                        href="<?php echo e(route('product.detail', ['slug' => $product->slug])); ?>">
                                                                        <?php echo e($product->name); ?>

                                                                    </a>
                                                                </h3>
                                                                <div class="box-price">
                                                                    <span class="new-price">Giá:
                                                                        <?php echo e($product->price_after_sale ? number_format($product->price_after_sale) . ' ' . $unit ?? '' : 'Liên hệ'); ?></span>
                                                                    <?php if($product->sale > 0): ?>
                                                                        <span
                                                                            class="old-price"><?php echo e(number_format($product->price)); ?>

                                                                            <?php echo e($unit ?? ''); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php if($tran->xuatsu): ?>
                                                                    <div class="free1">
                                                                        <img src="<?php echo e(asset('frontend/images/hopqua.png')); ?>"
                                                                            alt="vanchuyen"><?php echo e($tran->xuatsu); ?>

                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="free">
                                                                        <img src="<?php echo e(asset('frontend/images/vanchuyen.png')); ?>"
                                                                            alt="vanchuyen">Miễn phí vận chuyển toàn quốc
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php if(count($data)): ?>
                                        <?php echo e($data->appends(request()->all())->onEachSide(1)->links()); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($category->content): ?>
                            <div class="content-category" id="wrapSizeChange">
                                <?php echo $category->content; ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    

                </div>
            </div>
        </div>

        <form action="#" method="get" name="formfill" id="formfill" class="d-none">
            <?php echo csrf_field(); ?>
        </form>

    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function() {
            $(document).on('change', '.field-form', function() {
                // $( "#formfill" ).submit();

                let contentWrap = $('#dataProductSearch');

                let urlRequest = '<?php echo e(url()->current()); ?>';
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan101198\resources\views/page/product-by-category.blade.php ENDPATH**/ ?>