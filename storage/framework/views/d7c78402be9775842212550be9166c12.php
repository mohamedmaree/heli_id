<?php $__env->startSection('css'); ?>
    <style>
        .permissionCard{
            border: 0;
            margin-bottom: 13px;
        }

        .role-title{
            background: #5d54d4;
            padding: 12px;
            border-radius: 7px;
            /* margin-bottom: 10px; */
        }

        .list-unstyled{
            padding: 10px;
            height: 300px;
            /* scroll-behavior: smooth; */
            overflow: auto;
        }

        .selectP{
            margin-right: 10px;
            margin-top: 11px;
        }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.roles.update',$role->id)); ?>" method="post">
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                   
                                <div class="col-12">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-3">
                                            <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php if($loop->first): ?> active <?php endif; ?>"  data-toggle="pill" href="#first_<?php echo e($lang); ?>" aria-expanded="true"><?php echo e(__('admin.data')); ?> <?php echo e($lang); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div> 
                                    <div class="container mt-2">
                                        <div style="display: flex; flex-direction: row-reverse;">
                                            <p style="margin-right: 10px;"><?php echo e(__('admin.select_all')); ?></p>
                                            <input type="checkbox" id="checkedAll">
                                        </div>
                                    </div>

                                    <div class="tab-content">
                                        <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div role="tabpanel" class="tab-pane fade <?php if($loop->first): ?> show active <?php endif; ?> " id="first_<?php echo e($lang); ?>" aria-labelledby="first_<?php echo e($lang); ?>" aria-expanded="true">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column"><?php echo e(__('admin.name')); ?> <?php echo e($lang); ?></label>
                                                        <div class="controls">
                                                            <input type="text" value="<?php echo e($role->getTranslations('name')[$lang]??''); ?>" name="name[<?php echo e($lang); ?>]" class="form-control" placeholder="<?php echo e(__('admin.write') . __('admin.name')); ?> <?php echo e($lang); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="container mt-2">
                                        <div class="row">
                                            <?php echo $html; ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button"><?php echo e(__('admin.update')); ?></button>
                                <a href="<?php echo e(url()->previous()); ?>" type="reset" class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.back')); ?></a>
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
    $(function () {
        $('.checkChilds').each(function () {
            var childClass =  $(this).data('parent');
            console.log($('#'+childClass).prop("checked"));
            var count = 0 

            $("."+childClass).each(function() {
                if (!this.checked) {
                    count = count + 1 
                }
            });

            if (!$('#'+childClass).prop("checked")) {
                count = count + 1 
            }

            if (count > 0 ) {
                $(this).prop('checked' , false)
            }else{
                $(this).prop('checked' , true)
            }

        });

        

        $('.roles-parent').change(function (e) {
            var id =  $(this).attr('id');
            if (!this.checked) {
                var count = 0 
                $("."+id).each(function() {
                    if (this.checked) {
                        count = count + 1 
                    }
                });

                if (count > 0 ) {
                    $('#'+id).prop('checked' , true)
                }else{
                    $('#'+id).prop('checked' , false)
                }
            }
        });
        $('.checkChilds').change(function () {
            var childClass =  $(this).data('parent');
            if (this.checked) {
                $('.' +childClass).prop("checked", true);
                $('#' +childClass).prop("checked", true);
            } else {
                $('.' +childClass).prop("checked", false);
                $('#' +childClass).prop("checked", false);
            }
        });

        $('.childs').change(function () {
            var parent =  $(this).data('parent');
            if (this.checked) {
                $('#' +parent).prop("checked", true);
                var count = 0 
                $("."+parent).each(function() {
                    if (! this.checked) {
                        count = count + 1 
                    }
                });
                if (count > 0 ) {
                    $('.checkChilds_'+parent).prop('checked' , false)
                }else{
                    $('.checkChilds_'+parent).prop('checked' , true)
                }
            }else{
                $('.checkChilds_'+parent).prop('checked' , false)
            }
        });
    });


    $("#checkedAll").change(function () {
        if (this.checked) {
            $("input[type=checkbox]").each(function () {
                this.checked = true
            })
        } else {
            $("input[type=checkbox]").each(function () {
                this.checked = false;
            })
        }
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>