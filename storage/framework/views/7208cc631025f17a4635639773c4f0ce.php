<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/forms/select/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="<?php echo e(route('admin.introfqs.store')); ?>" class="store form-horizontal" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
                                   
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"><?php echo e(__('admin.section')); ?></label>
                                            <div class="controls">
                                                <select name="intro_fqs_category_id" class="select2 form-control" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                                    <option value><?php echo e(__('admin.select_section')); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column"><?php echo e(__('site.question_'.$lang)); ?></label>
                                                <div class="controls">
                                                    <input type="text" name="title[<?php echo e($lang); ?>]" class="form-control" placeholder="<?php echo e(__('site.write') . __('site.question_'.$lang)); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('site.answer_'.$lang)); ?></label>
                                                    <textarea class="form-control" name="description[<?php echo e($lang); ?>]" id="" cols="30" rows="10"  placeholder="<?php echo e(__('site.write') . __('site.answer_'.$lang)); ?>"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/forms/select/form-select2.js')); ?>"></script>
    
   
       <?php echo $__env->make('admin.shared.submitAddForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/introfqs/create.blade.php ENDPATH**/ ?>