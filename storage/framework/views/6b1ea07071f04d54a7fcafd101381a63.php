    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container-fluid">

        <div class="section-title">
          <h2><?php echo e(__('site.portfolio')); ?></h2>
          <h3><?php echo e(__('site.check_our')); ?> <span><?php echo e(__('site.portfolio')); ?></span></h3>
          <p><?php echo $settings['portfolio_text_'.lang()]; ?></p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php $__currentLoopData = $categoies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-filter=".filter-<?php echo e($category->name); ?>"><?php echo e($category->name); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container justify-content-center">

          <div class="col-xl-10">
            <div class="row">
              <?php $__currentLoopData = $categoies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $category->portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-<?php echo e($category->name); ?>">
                    <div class="portfolio-wrap">
                      <img src="<?php echo e($portfolio->images[0]->image??''); ?>" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4> <?php echo e($category->name); ?> <?php echo e($loop->iteration); ?></h4>
                        <p><?php echo e($category->name); ?></p>
                        <div class="portfolio-links">
                          <a href="<?php echo e($portfolio->images[0]->image??''); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo e($category->name); ?> <?php echo e($loop->iteration); ?>"><i class="bx bx-plus"></i></a>
                          <a href="<?php echo e(route('portfolio-details',[$portfolio])); ?>" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                  </div>
                </div><!-- End portfolio item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



           

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/parts/portfolio.blade.php ENDPATH**/ ?>