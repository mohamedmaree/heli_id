<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')); ?>">
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
                        <form  method="POST" action="<?php echo e(route('admin.portfoliocategories.store')); ?>" class="store form-horizontal" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
                                   
                                    
                                    <div class="col-12">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs  mb-3">
                                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link <?php if($loop->first): ?> active <?php endif; ?>"  data-toggle="pill" href="#first_<?php echo e($lang); ?>" aria-expanded="true"><?php echo e(__('admin.data')); ?> <?php echo e($lang); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div> 

                                        

                                    
                                       <div class="tab-content">
                                                <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div role="tabpanel" class="tab-pane fade <?php if($loop->first): ?> show active <?php endif; ?> " id="first_<?php echo e($lang); ?>" aria-labelledby="first_<?php echo e($lang); ?>" aria-expanded="true">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column"><?php echo e(__('admin.name')); ?> <?php echo e($lang); ?></label>
                                                                <div class="controls">
                                                                    <input type="text" name="name[<?php echo e($lang); ?>]" class="form-control" placeholder="<?php echo e(__('admin.write') . __('admin.name')); ?> <?php echo e($lang); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                           
                                    
                                    </div>



                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 submit_button"><?php echo e(__('admin.add')); ?></button>
                                            <a href="<?php echo e(url()->previous()); ?>" type="reset"
                                                class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.back')); ?></a>
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/portfoliocategories/create.blade.php ENDPATH**/ ?>