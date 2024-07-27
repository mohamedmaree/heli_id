<?php $__env->startSection('content'); ?>
   <!-- Start body-content -->

   <main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <ol>
          <li><a href="<?php echo e(route('intro')); ?>"><?php echo e(__('site.home')); ?></a></li>
          <li><?php echo e($service->title); ?></li>
        </ol>
        <h2><?php echo e($service->title); ?></h2>
      </div>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="row">
          <p>
            <?php echo e($service->description); ?>

          </p>
        </div>
      </div>
    </div>
</section>

</main><!-- End #main -->

<!-- end body-content --> 
<?php $__env->stopSection(); ?>
    

  
<?php echo $__env->make('intro_site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/serviceDetails.blade.php ENDPATH**/ ?>