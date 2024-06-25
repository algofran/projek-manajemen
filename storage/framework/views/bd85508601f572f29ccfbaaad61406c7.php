<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="assets/img/visdat.png">
    <title>
      Projek Management Visdat
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/feather/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/icons/flags/flags.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/alertify/alertify.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

    
    <script src="<?php echo e(asset('assets-admin/js/jquery-1.11.1.min.js')); ?>" crossorigin="anonymous"></script>
</head>

<body>
  <div class="main-wrapper">
  <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="page-wrapper">
            <div class="content container-fluid">
              <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div> 
      <?php echo $__env->make('components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
      <?php if(session()->has('alert')): ?>
    <script>
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
          });
          Toast.fire({
            icon: "<?php echo e(session('alert')); ?>",
            title: "<?php echo e(session('message')); ?>"
          });
    </script>
  <?php endif; ?>
      <?php echo $__env->yieldContent('script'); ?>    
  </body>  
</html><?php /**PATH /var/www/resources/views/layouts/layout.blade.php ENDPATH**/ ?>