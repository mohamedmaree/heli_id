<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="<?php echo e(route('admin.introsocials.store')); ?>" class="store form-horizontal" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
                                   
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"><?php echo e(__('admin.name')); ?></label>
                                            <div class="controls">
                                                <input type="text" name="key" class="form-control" placeholder="<?php echo e(__('admin.write_the_name')); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"><?php echo e(__('admin.link')); ?></label>
                                            <div class="controls">
                                                <input type="url" name="url"   class="form-control" placeholder="<?php echo e(__('admin.enter_the_link')); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"><?php echo e(__('admin.icon')); ?></label>
                                            <div class="controls">
                                                <input type="url" name="icon"   class="form-control" placeholder="<?php echo e(__('admin.enter_the_icon')); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button"><?php echo e(__('admin.add')); ?></button>
                                        <a href="<?php echo e(url()->previous()); ?>" type="reset" class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.back')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')); ?>"></script>
    
    
        <?php echo $__env->make('admin.shared.addImage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
        <?php echo $__env->make('admin.shared.submitAddForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/introsocials/create.blade.php ENDPATH**/ ?>