
    <div class="sec-padd bacg_section2" id="FAQ">
        <div class="container">
            <div class="the_title">
                <h3><?php echo e(__('intro_site.fqs')); ?></h3>
                <p class="grey-color">
                   <?php echo e($settings['fqs_text']); ?>

                </p>
            </div>

            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <?php $__currentLoopData = $fqsCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php echo e($key == 0 ? 'active' : ''); ?>" id="pills-<?php echo e($category->id); ?>-tab" data-toggle="pill" href="#pills-<?php echo e($category->id); ?>" role="tab" aria-controls="pills-<?php echo e($category->id); ?>" aria-selected="true"><?php echo e($category->title); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <?php $__currentLoopData = $fqsCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade <?php echo e($key == 0 ? 'show active' : ''); ?>" id="pills-<?php echo e($category->id); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($category->id); ?>-tab">

                        <div class="accordion" id="accordionExample">
                            <?php $__currentLoopData = $category->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fqsKey => $fqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <button class="" type="button" data-toggle="collapse" data-target="#<?php echo e('collapse_'.$fqs->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo e($fqsKey + 1); ?> - <?php echo e($fqs ->title); ?>

                                        </button>
                                    </div>
                                    <div id="<?php echo e('collapse_'.$fqs->id); ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body"> <?php echo e($fqs ->description); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/fqs.blade.php ENDPATH**/ ?>