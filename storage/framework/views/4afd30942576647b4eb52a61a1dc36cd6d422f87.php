<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $__env->yieldContent('title'); ?></title>

  <!-- Font Awesome Icons -->
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('font/fontawesome-5.13.1/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('lib/adminlte/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('lib/sweetalert2/css/sweetalert2.min.css')); ?>">
  <link href="<?php echo e(asset('lib/select2/css/select2.min.css')); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/css/stylesheet.css')); ?>">
  <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
  <?php echo $__env->make('admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.navbar -->

  <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('content'); ?>
  <?php echo $__env->make('admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery-3.2.1.min.js')); ?> "></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('lib/adminlte/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>

<script src="https://cdn.tiny.cloud/1/b2vtb365nn7gj3ia522w5v4dm1wcz2miw5agwj55cejtlox1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="<?php echo e(asset('lib/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/ajax/deleteAdminAjax.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/js/function.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/ajax/ajax-paragraph.js')); ?>"></script>
<script>
    // đoạn văn
    $(document).on('click', '#addOptionProduct', function() {
     // alert('a');
     event.preventDefault();
     //  let wrapActive = $(this).parents('.wrap-load-active');
     let urlRequest = $(this).data("url");
     //let i = $('.wrap-paragraph tbody').find('tr').length;
     //  alert(urlRequest);
     $.ajax({
         type: "GET",
         url: urlRequest,
         // data: { i: i },
         success: function(data) {
             if (data.code == 200) {
                 let html = data.html;
                 $('#wrapOption').append(html);
                 // if ($("textarea.tinymce_editor_init").length) {
                 //     tinymce.init(editor_config);
                 // }
             }
         }
     });
 });
 $(document).on('click', '.deleteOptionProduct', function() {
     event.preventDefault();
     let $this = $(this);
     Swal.fire({
         title: "Bạn có muốn xóa option?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Tôi đồng ý'
     }).then((result) => {
         if (result.isConfirmed) {
             $this.parents('.col-item-price').remove();
         }
     })
 });
  // load delete đáp án  khi đáp án chưa thêm database
  $(document).on('click', '.deleteOptionProductDB', function() {
     event.preventDefault();
     let urlRequest = $(this).data("url");
     let mythis = $(this);
     Swal.fire({
         title: 'Bạn có chắc chắn muốn xóa option này',
         text: "Bạn sẽ không thể khôi phục điều này",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Tôi đồng ý!'
     }).then((result) => {
         if (result.isConfirmed) {
             $.ajax({
                 type: "GET",
                 url: urlRequest,
                 success: function(data) {
                     if (data.code == 200) {
                         mythis.parents(".col-item-price").remove();
                     }
                 },
                 error: function() {

                 }
             });
             // Swal.fire(
             // 'Deleted!',
             // 'Your file has been deleted.',
             // 'success'
             // )
         }
     })
 });
</script>
<script>
    // js render slug khi nháº­p tĂªn
    $(document).on('change keyup', '.nameChangeSlug', function() {
        let name = $(this).val();
        $('#title_seo').val(name);
        $('#description_seo').val(name);
        $('#keyword_seo').val(name);
    });
</script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\doan101198\resources\views/layout/main.blade.php ENDPATH**/ ?>