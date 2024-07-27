<?php $__env->startSection('content'); ?>
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body">
                        <form  class="store form-horizontal" >
                            <div class="form-body">
                                <div class="row">
                                    
                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('site.title_'.$lang)); ?> </label>
                                                    <textarea class="form-control" name="title[<?php echo e($lang); ?>]" id="" cols="30" rows="10" placeholder="<?php echo e(__('site.write') . __('site.title_'.$lang)); ?>"><?php echo e($service->getTranslations('title')[$lang]); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.short_description')); ?> <?php echo e($lang); ?></label>
                                                <textarea class="form-control" name="short_description[<?php echo e($lang); ?>]" id="" cols="30" rows="10" placeholder="<?php echo e(__('site.write') . __('admin.short_description')); ?><?php echo e($lang); ?>"><?php echo e($service->getTranslations('short_description')[$lang]); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('site.description_'.$lang)); ?> </label>
                                                    <textarea class="form-control" name="description[<?php echo e($lang); ?>]" id="" cols="30" rows="10" placeholder="<?php echo e(__('site.write') . __('site.description_'.$lang)); ?>"><?php echo e($service->getTranslations('description')[$lang]); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"><?php echo e(__('admin.icon')); ?></label>
                                            <div class="controls">
                                                <input type="text" name="icon" value="<?php echo e($service->icon); ?>"   class="form-control" placeholder="<?php echo e(__('admin.enter_the_icon')); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mt-3">
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
    <script>
        $('.store input').attr('disabled' , true)
        $('.store textarea').attr('disabled' , true)
        $('.store select').attr('disabled' , true)

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/introservices/show.blade.php ENDPATH**/ ?>