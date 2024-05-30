<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('css'); ?>
   <style>
        .container-cart{
            max-width: 600px;
        }
        .template-search{
            background: #eee;
        }
        .title-cart{
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 20px;
        }
        .bg-cart{
            background: #fff;
        }
        .sucess-order{
            display: block;
            overflow: hidden;
            background-color: #f5f5f5;
            text-align: center;
            padding: 10px 0;
            color: #34c772;
            font-size: 25px;
            font-weight: bold;
        }
        .order-content{
            padding: 10px 0px;
        }
        .order-content .infor-order{}
        .thank-you{}
        .order-content  .list-infor{
            display: block;
            overflow: hidden;
            background-color: #f3f3f3;
            padding:10px;
        }
        .order-content  .list-infor li{
            line-height: 25px;
            padding: 5px 0;
        }
        .order-content  .list-infor li span{
            font-weight: 600;
            color: #000;
        }
        .order-content  .total-price{
            color: red;
        }
        .order-content  .total-price span{

        }
        .buy-more{}
        .buy-more a{
            overflow: hidden;
            border: 1px solid #288ad6;
            color: #288ad6;
            background-color: #fff;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }
        .order-item h4{
            margin: 0;
            font-size: 12px;
            font-weight: bold;
        }
        .title-order{
            font-size: 14px;
            font-weight: bold;

        }
   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <div class="container container-cart">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-cart mt-5 mb-5">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <div class="sucess-order text-center mb-3">
                                        <?php if(session("sucess")): ?>
                                        <i class="fas fa-shopping-bag mr-3"></i> <?php echo e(session("sucess")); ?>

                                        <?php elseif(session("error")): ?>
                                        <i class="fas fa-shopping-bag mr-3"></i> <?php echo e(session("error")); ?>

                                        <?php else: ?>
                                        <i class="fas fa-shopping-bag mr-3"></i> Bạn chưa đặt hàng
                                        <?php endif; ?>
                                    </div>

                                    <div class="order-content">
                                        <?php if(session("sucess")): ?>
                                        <div class="infor-order mb-3">
                                            <div class="thank-you text-center mb-3">
                                             Cảm ơn quý khách  đã đặt hàng của chúng tôi
                                            </div>
                                            <ul class="list-infor">
                                                <li><span>Người nhận hàng </span> <?php echo e($data->name); ?></li>
                                                <li><span>Giao đến </span>  <?php echo e($data->address_detail); ?>, <?php echo e($data->commune->name); ?>, <?php echo e($data->district->name); ?>, <?php echo e($data->city->name); ?> (nhân viên sẽ gọi xác nhận trước khi giao).
                                                    (nhân viên sẽ gọi xác nhận trước khi giao).</li>
                                                <li class="total-price"><span>Tổng tiền </span> <?php echo e(number_format($data->total)); ?> <?php echo e($unit??'đ'); ?></li>
                                            </ul>
                                          <div class="list-order-product pt-4 pb-4">
                                            <div class="title-order  mb-3">
                                                Sản phẩm đã đặt
                                            </div>
                                            <div class="row">
                                                <?php $__currentLoopData = $data->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="order-item">
                                                        <div class="media p-0">
                                                            <div class="image position-relative">
                                                                <a href="javascript:;"> <img src="<?php echo e(asset($productItem->avatar_path)); ?>" alt="<?php echo e($productItem->name); ?>" class="" style="width:100px;"></a>
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <div class="content">
                                                                    <h4><a href="javascript:;"><?php echo e($productItem->name); ?></a> </h4>
                                                                    <span>Số lượng: <?php echo e($productItem->quantity); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                          </div>
                                         </div>
                                         <?php endif; ?>
                                         <div class="buy-more text-center">
                                             <a href="<?php echo e(route('home.index')); ?>" class="btn">Mua thêm sản phẩm khác</a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doan101198\resources\views/page/order-sucess.blade.php ENDPATH**/ ?>