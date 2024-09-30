

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">
  
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style="background: url('<?php echo e($settings['about_image_1']); ?>') center center no-repeat;">
              <a href="<?php echo e($settings['intro_about_video']); ?>" class="glightbox play-btn mb-4"></a>
            </div>
  
            <div class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <h3><?php echo e($settings['intro_about_title_'.lang()]); ?></h3>
              <p><?php echo $settings['intro_about_'.lang()]; ?></p>
  
              <?php if($settings['intro_about_step1_'.lang()] ): ?>
              <div class="icon-box">
                <div class="icon"><i class="bx bx-fingerprint"></i></div>
                <h4 class="title"><a href=""><?php echo e($settings['intro_about_step1_title_'.lang()]); ?></a></h4>
                <p class="description"><?php echo $settings['intro_about_step1_'.lang()]; ?></p>
              </div>
              <?php endif; ?>
  
              <?php if($settings['intro_about_step2_'.lang()] ): ?>
              <div class="icon-box">
                <div class="icon"><i class="bx bx-gift"></i></div>
                <h4 class="title"><a href=""><?php echo e($settings['intro_about_step2_title_'.lang()]); ?></a></h4>
                <p class="description"><?php echo $settings['intro_about_step2_'.lang()]; ?></p>
              </div>
              <?php endif; ?>
  
              <?php if($settings['intro_about_step3_'.lang()] ): ?>
              <div class="icon-box">
                <div class="icon"><i class="bx bx-atom"></i></div>
                <h4 class="title"><a href=""><?php echo e($settings['intro_about_step3_title_'.lang()]); ?></a></h4>
                <p class="description"><?php echo $settings['intro_about_step3_'.lang()]; ?></p>
              </div>
              <?php endif; ?>
  
            </div>
          </div>
  
        </div>
      </section><!-- End About Section --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/about.blade.php ENDPATH**/ ?>