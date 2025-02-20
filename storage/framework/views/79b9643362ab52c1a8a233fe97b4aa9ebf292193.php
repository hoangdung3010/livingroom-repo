<style>
	body {
		font-family: 'Open Sans', sans-serif;
		background-color: #fff!important;
	}
	@import  url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
	.nav-item i {
		padding-right: 5px;
	}
	.nav-sidebar>.nav-item a p {
		font-size: 14px;
	}
	.nav-treeview>.nav-item>.nav-link {
		color: #eee;
		padding: 4px 20px 4px 32px;
	}
	.nav-item i {
		color: #b3cbdd;
		padding-right: 5px;
	}
	.nav-treeview>.nav-item>.nav-link p {
		font-size: 12px;
		color: #b3cbdd
	}
	.nav-treeview>.nav-item>.nav-link i {
		font-size: 12px;
		color: #b3cbdd
	}
	.sidebar {
		background: #2A3F54;
		padding: 0;
	}
	.sidebar a {
		color: #17a2b8;
	}
	.form-inline {
		padding: 15px 0;
	}
	.nav-sidebar>.nav-item {
		color: #b3cbdd;
		font-size: 14px;
		padding-left: 0px;
		border-bottom: 1px solid #25384c;
		border-top: 1px solid #304558;
	}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2A3F54;">
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        
       
       <!-- Sidebar Menu -->
       
       <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			  <li class="nav-item">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
                   <i class="fas fa-tachometer-alt"></i>
                   <p>BẢNG ĐIỀU KHIỂN</p>
                </a>
             </li>
			  

             <li class="nav-item">
                <a href="#" class="nav-link ">
                   <i class="fas fa-chart-bar"></i>
                   <p>
                      Sản phẩm
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">

                   	<li class="nav-item">
                      <a href="<?php echo e(route('admin.categoryproduct.index')); ?>" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh mục sản phẩm</p>
                      </a>
                   	</li>


					      <li class="nav-item">
                      <a href="<?php echo e(route('admin.product.index')); ?>" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Sản phẩm</p>
                      </a>
                    </li>

                  

                  <li class="nav-item">
                    <a href="<?php echo e(route('admin.productstar.index')); ?>" class="nav-link">
                       <i class="fas fa-angle-double-right"></i>
                       <p>Quản lý đánh giá sao</p>
                    </a>
                  </li>

               </ul>
             </li>

             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-globe-americas"></i>
                   <p>
                      Tin tức
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">

                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.categorypost.index')); ?>" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh mục</p>
                      </a>
                   </li>


					<li class="nav-item">
                      <a href="<?php echo e(route('admin.post.index')); ?>" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Tin tức</p>
                      </a>
                   </li>

                </ul>
             </li>
			   <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cog"></i>
                   <p>
                      Trang thông tin
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">

                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.setting.index')); ?>" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Trang thông tin</p>
                      </a>
                   </li>

                </ul>
             </li>
             

             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cart-plus"></i>
                   <p>
                      Quản lý đơn hàng
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.transaction.index')); ?>" class="nav-link">
                         <i class="fas fa-cart-plus"></i>
                         <p>Đơn hàng</p>
                      </a>
                   </li>
                   
                </ul>
             </li>

             


             
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-id-card-alt"></i>
                   <p>
                      Thông tin liên hệ
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh sách liên hệ</p>
                      </a>
                   </li>
                </ul>
             </li>

             

             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cog"></i>
                   <p>
                      Hệ thống
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
				 <ul class="nav nav-treeview">

                   <li class="nav-item">
                      <a href="#" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Quản trị viên</p>
                      </a>
                   </li>


					 <li class="nav-item">
                      <a href="#" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Vai trò</p>
                      </a>
                   </li>

                </ul>
             </li>
			  <!--
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                      Simple Link
                      <span class="right badge badge-danger">New</span>
                   </p>
                </a>
             </li>-->
          </ul>
       </nav>
    </div>
 </aside>
<?php /**PATH C:\xampp\htdocs\doan101198\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>