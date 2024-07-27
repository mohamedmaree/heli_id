<?php $__env->startSection('content'); ?>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    

                    <div class="card-content">
                        <div class="card-body">
                            <form >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column"><?php echo e(__('admin.user_name')); ?></label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="<?php echo e($message->name); ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column"><?php echo e(__('admin.phone')); ?></label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="<?php echo e($message->phone); ?>" disabled >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column"><?php echo e(__('admin.email')); ?></label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="<?php echo e($message->email); ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column"><?php echo e(__('admin.text_of_message')); ?></label>
                                                <div class="controls">
                                                    <textarea class="form-control" cols="30" messages="10" disabled><?php echo e($message->message); ?></textarea>
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/intromessages/show.blade.php ENDPATH**/ ?>