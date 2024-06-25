

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mb-5">
        <div class="col-sm-12 mb-5">
            <div class="card card-table mb-4">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
                    Menu Rekap Data
                </div>
            </div> <!-- End of card-table -->
                <div class="row mt-3 mb-4">
                    
                    <div class="col-12 col-lg-4 col-xl-4 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="<?php echo e(route('rekapdatapendapatan')); ?>">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="db-icon bg-gradient bg-success">
                                                    <i class="fa fa-dollar-sign"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 my-auto">
                                                <h5 class="card-title">Pendapatan</h5>
                                            </div>  
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="<?php echo e(route('rekapdatapengeluaran')); ?>">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="db-icon bg-gradient bg-secondary">
                                                    <i class="fa fa-undo"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 my-auto">
                                                <h5 class="card-title">Pengeluaran</h5>
                                            </div>  
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> <!-- End of row -->
           
        </div> <!-- End of col-sm-12 -->
    </div> <!-- End of row -->
</div> <!-- End of container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    feather.replace();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/rekapdata/menurekap.blade.php ENDPATH**/ ?>