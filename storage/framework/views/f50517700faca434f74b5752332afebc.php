<footer id="footer">

    

    <div class="footer-top">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">

              <div class="col-lg-3 col-md-6 footer-links">
                <h4><?php echo e(__('site.useful_links')); ?></h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo e(route('intro')); ?>#"><?php echo e(__('site.home')); ?></a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo e(route('intro')); ?>#about"><?php echo e(__('site.about_us')); ?></a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo e(route('intro')); ?>#services"><?php echo e(__('site.services')); ?></a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo e(route('intro')); ?>#portfolio"><?php echo e(__('site.portfolio')); ?></a></li>
                  
                  <?php if(count($teams)): ?>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo e(route('intro')); ?>#team"><?php echo e(__('site.team')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4><?php echo e(__('site.services')); ?></h4>
                <ul>
                  <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><i class="bx bx-chevron-right"></i> <a href="<?php echo e(route('service-details',[$service])); ?>"><?php echo e($service->title); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-contact">
                <h4><?php echo e(__('site.contact_us')); ?></h4>
                <p>
                  <?php echo e($settings['intro_address']); ?> <br><br>
                  <strong><?php echo e(__('site.phone')); ?>:</strong> <?php echo e($settings['intro_phone']); ?> <br>
                  <strong><?php echo e(__('site.email')); ?>:</strong> <?php echo e($settings['intro_email']); ?> <br>
                </p>

              </div>

              <div class="col-lg-3 col-md-6 footer-info">
                <h3><?php echo e(__('site.about')); ?> <?php echo e($settings['intro_name_'.lang()]); ?> </h3>
                <p><?php echo Str::limit($settings['intro_about_'.lang()],400); ?> </p>
                <div class="social-links mt-3">
                  <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($social->url); ?>" target="blank" class="<?php echo e($social->key); ?>"><i class="<?php echo e($social->icon); ?>"></i></a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo e($settings['intro_name_'.lang()]); ?> </span></strong>. <?php echo e(__('site.rights')); ?>

      </div>
      <div class="credits">
      <?php echo e(__('site.designed')); ?> <a href="mailto:m7mdmaree26@gmail.com"><?php echo e(__('site.maree')); ?></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('intro_site/js/jquery-3.2.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/purecounter/purecounter_vanilla.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/waypoints/noframework.waypoints.js')); ?>"></script>
  <script src="<?php echo e(asset('intro_site/vendor/php-email-form/validate.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('intro_site/js/main.js')); ?>"></script>
  <script> 
    $(document).on('submit','.send-message',function (e) {
        e.preventDefault()
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            method: 'post',
            data: new FormData($(this)[0]),
            dataType:'json',
            processData: false,
            contentType: false,
            success: function(response){
                $('.error_meassages').remove();
                    toastr.success(response.message)
                    $('.send-message')[0].reset()
            },
            error: function (xhr) {
                $('.error_meassages').remove();
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('.send-message input[name=' + key + ']').after('<small class="form-text error_meassages text-danger">' + value + '</small>');
                    $('.send-message textarea[name=' + key + ']').after('<small class="form-text error_meassages text-danger">' + value + '</small>');
                });
            },
        });
    })
  </script>
</body>

</html><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/layouts/footer.blade.php ENDPATH**/ ?>