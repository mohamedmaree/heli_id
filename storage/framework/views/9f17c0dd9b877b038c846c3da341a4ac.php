
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="<?php echo e(route('intro')); ?>"><?php echo e($settings['intro_name_'.lang()]); ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo e(route('intro')); ?>#hero"><?php echo e(__('site.home')); ?></a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#about"><?php echo e(__('site.about_us')); ?></a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#services"><?php echo e(__('site.services')); ?></a></li>
          <li><a class="nav-link  scrollto" href="<?php echo e(route('intro')); ?>#portfolio"><?php echo e(__('site.portfolio')); ?></a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#parteners"><?php echo e(__('site.parteners')); ?></a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#team"><?php echo e(__('site.team')); ?></a></li>
          
          <li><a class="nav-link scrollto" href="#contact"><?php echo e(__('site.contact_us')); ?></a></li>
          <?php if(lang() == 'ar'): ?>
          <li><a class="nav-link" href="<?php echo e(route('change-lang',['en'])); ?>">English</a></li>
          <?php else: ?>
          <li><a class="nav-link" href="<?php echo e(route('change-lang',['ar'])); ?>">العربية</a></li>
          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/layouts/nav.blade.php ENDPATH**/ ?>