

         <!-- ======= Testimonials Section ======= -->
    <section id="parteners" class="testimonials section-bg">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2><?php echo e(__('intro_site.parteners')); ?></h2>
            <h3><?php echo e(__('site.what')); ?> <span><?php echo e(__('site.are_saying')); ?></span> <?php echo e(__('site.about2')); ?></h3>
            <p><?php echo e($settings['parteners_text_'.lang()]); ?></p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
  
              <div class="row">

                <?php $__currentLoopData = $parteners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partener): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                      <div class="testimonial-item mt-4 mt-lg-0">
                        <img src="<?php echo e($partener->image); ?>" class="testimonial-img" alt="">
                        <h3><?php echo e($partener->name); ?></h3>
                        <h4><?php echo e($partener->job); ?></h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          <?php echo e($partener->opinion); ?>

                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div><!-- End testimonial-item -->
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
                
                
  
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Testimonials Section --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/parteners.blade.php ENDPATH**/ ?>