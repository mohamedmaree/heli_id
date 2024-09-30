   <?php if(count($teams)): ?>
   <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2><?php echo e(__('site.team')); ?></h2>
            <h3><?php echo e(__('site.team2')); ?></h3>
            <p><?php echo $settings['team_text_'.lang()]; ?></p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="row">
               
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="member">
                    <img src="<?php echo e($team->image); ?>" class="img-fluid" alt="">
                    <div class="member-info">
                      <div class="member-info-content">
                        <h4><?php echo e($team->name); ?></h4>
                        <span><?php echo e($team->job); ?></span>
                      </div>
                      
                    </div>
                  </div>
                </div> <!-- End Member Item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
  
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Team Section -->
      <?php endif; ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/team.blade.php ENDPATH**/ ?>