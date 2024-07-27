

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2><?php echo e(__('site.contact_us')); ?></h2>
            <h3><?php echo e(__('site.get_int_touch')); ?><span><?php echo e(__('site.us')); ?></span></h3>
            <p><?php echo e($settings['contact_text_'.lang()]); ?></p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="row">
  
                <div class="col-lg-6">
  
                  <div class="row justify-content-center">
  
                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                      <i class="bx bx-map"></i>
                      <h4><?php echo e(__('site.address')); ?></h4>
                      <p><?php echo e($settings['intro_address']); ?></p>
                    </div>
                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                      <i class="bx bx-phone"></i>
                      <h4><?php echo e(__('site.call_us')); ?></h4>
                      <p><?php echo e($settings['intro_phone']); ?></p>
                    </div>
                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                      <i class="bx bx-envelope"></i>
                      <h4><?php echo e(__('site.email_us')); ?></h4>
                      <p><?php echo e($settings['intro_email']); ?> </p>
                    </div>
                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                      <i class="bx bx-time-five"></i>
                      <h4><?php echo e(__('site.working_hours')); ?></h4>
                      <p><?php echo e($settings['intro_working_hours_'.lang()]); ?> </p>
                    </div>
  
                  </div>
  
                </div>

                <div class="col-lg-6">
                  <form action="<?php echo e(route('send-message')); ?>" enctype="multipart/form-data" method="POST" class="send-message">
                  <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="name"><?php echo e(__('site.name')); ?></label>
                        
                        <input type="text" name="name" placeholder="<?php echo e(__('site.name')); ?>" class="form-control" id="name" required>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="email"><?php echo e(__('site.email')); ?></label>
                        <input type="email" name="email"  class="form-control" placeholder="<?php echo e(__('site.email')); ?>" id="email" required>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <label for="phone"><?php echo e(__('site.phone')); ?></label>
                      <input type="number"  name="phone" class="form-control"  placeholder="<?php echo e(__('admin.phone')); ?>"  id="phone" required>
                    </div>
                    <div class="form-group mt-3">
                      <label for="message"><?php echo e(__('site.message')); ?></label>
                      <textarea class="form-control" name="message" placeholder="<?php echo e(__('site.write_here')); ?>" rows="8" required></textarea>
                    </div>
                    
                    <button type="submit" style="border: 2px solid #428bca;
                      padding: 12px 35px;
                      transition: 0.4s;
                      background: #428bca;
                      color: #fff;
                      border-radius: 4px;margin-top: 10px;"><?php echo e(__('site.send')); ?></button>
                  </form>
                </div>
  
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Contact Section --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/contact_us.blade.php ENDPATH**/ ?>