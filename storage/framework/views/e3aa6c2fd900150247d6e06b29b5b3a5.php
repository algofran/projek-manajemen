

<?php $__env->startSection('content'); ?>
    <section>
        <div class="page-header min-vh-100" style="background: linear-gradient(to bottom right, #bc0000, rgb(255, 255, 255))"
        >
            <div class="container">
                <div class="row">
                    <!-- Login Form -->
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-5">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-white">Aplikasi Manajemen Projek</h3>
                                <p class="mb-0 text-white fw-bold">PT. Visdat</p>
                                <p class="mb-0 text-white fw-bold">Visual Data Komputer</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo e(route('login')); ?>" role="form">
                                    <?php echo csrf_field(); ?>
                                    <label class="text-white">Email</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email" name="email" aria-label="Email" aria-describedby="email-addon">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong class="text-white"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <label class="text-white">Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon">
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong class="text-white"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-danger w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    
                                    
                                </p>
                            </div>
                        </div>
                        <!-- End of  Login Form -->
                        <p class="text-white text-center">
                            Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script> Andi Amalia Ramadani
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n10" style="background-image:url('<?php echo e(asset('assets/img/img-05.jpg')); ?>')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/login.blade.php ENDPATH**/ ?>