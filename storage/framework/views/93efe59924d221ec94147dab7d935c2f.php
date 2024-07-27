<div class="sec-padd" id="how_work">
    <div class="container">
        <div class="the_title">
            <h3><?php echo e(__('intro_site.how_work')); ?> <?php echo e($settings['intro_name']); ?></h3>
            <p class="grey-color"><?php echo e($settings['how_work_text']); ?> </p>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <ul class="how_work">
                    <?php $__currentLoopData = $howWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $howWork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                        <li>
                            <img  loading="lazy"  src="<?php echo e($howWork->image); ?>">
                            <div><?php echo e($howWork->title); ?></div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </div>
        </div>
    </div>
</div><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/how_work.blade.php ENDPATH**/ ?>