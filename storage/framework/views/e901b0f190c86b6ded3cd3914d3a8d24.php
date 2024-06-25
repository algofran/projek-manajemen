<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('components.login-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <?php echo $__env->yieldContent('content'); ?>
</main>

<?php echo $__env->make('components.login-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /var/www/resources/views/layouts/login-layout.blade.php ENDPATH**/ ?>