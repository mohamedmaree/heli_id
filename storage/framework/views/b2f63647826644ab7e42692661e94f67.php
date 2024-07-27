<?php $__env->startSection('content'); ?>
   <!-- Start body-content -->

   <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo e(route('intro')); ?>"><?php echo e(__('site.home')); ?></a></li>
          <li><?php echo e(__('site.porto_details')); ?></li>
        </ol>
        <h2><?php echo e(__('site.porto_details')); ?> </h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <?php $__currentLoopData = $portfolio->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide">
                    <img src="<?php echo e($image->image); ?>" alt="">
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php echo e(__('site.project_info')); ?></h3>
              <ul>
                <li><strong><?php echo e(__('site.category')); ?></strong>: <?php echo e($portfolio->category->name??''); ?></li>
                <li><strong><?php echo e(__('site.client')); ?></strong>: <?php echo e($portfolio->client); ?></li>
                <li><strong><?php echo e(__('site.project_date')); ?></strong>: <?php echo e($portfolio->date); ?></li>
                <li><strong><?php echo e(__('site.project_url')); ?></strong>: <a href="<?php echo e($portfolio->url); ?>" target="blank"><?php echo e($portfolio->url); ?> </a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2><?php echo e(__('site.porto_details')); ?></h2>
              <p>
                <?php echo e($portfolio->description); ?>

              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<!-- end body-content --> 
<?php $__env->stopSection(); ?>
    

  
<?php echo $__env->make('intro_site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/portfolioDetails.blade.php ENDPATH**/ ?>