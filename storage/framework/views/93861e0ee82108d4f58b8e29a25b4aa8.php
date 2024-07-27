


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2><?php echo e(__('site.services')); ?></h2>
            <h3><?php echo e(__('site.check_our')); ?> <span> <?php echo e(__('site.services')); ?></span></h3>
            <p><?php echo e($settings['services_text_'.lang()]); ?></p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="row">
                
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="<?php echo e($service->icon); ?>"></i></div>
                    <h4 class="title"><a href="<?php echo e(route('service-details',[$service])); ?>"><?php echo e($service->title); ?></a></h4>
                    <p class="description"><?php echo e($service->short_description); ?></p>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Services Section -->

          <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">
  
          <div class="text-center">
            
            
            
          </div>
  
        </div>
      </section><!-- End Cta Section --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/services.blade.php ENDPATH**/ ?>