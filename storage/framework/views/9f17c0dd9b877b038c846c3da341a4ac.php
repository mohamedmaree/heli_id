
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <a href="<?php echo e(route('intro')); ?>#hero" class="logo"><img src="<?php echo e($settings['intro_logo']); ?>" alt="" class="img-fluid"></a>

      <h1 class="logo mx-3"><a href="<?php echo e(route('intro')); ?>"><?php echo e($settings['intro_name_'.lang()]); ?></a></h1>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo e(route('intro')); ?>#hero"><?php echo e(__('site.home')); ?></a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#about"><?php echo e(__('site.about_us')); ?></a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#services">Products & Solutions</a></li>
          
          
          <?php if(count($teams)): ?>
            <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#team"><?php echo e(__('site.team')); ?></a></li>
          <?php endif; ?>
          
          <li><a class="nav-link scrollto" href="<?php echo e(route('intro')); ?>#contact"><?php echo e(__('site.contact_us')); ?></a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header --><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/layouts/nav.blade.php ENDPATH**/ ?>