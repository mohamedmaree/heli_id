<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" style="background-color: rgb(33,41,54);">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo e(url('admin/dashboard')); ?>">
                    <img class="brand-logo img-logo" src="<?php echo e($settings['logo']); ?>" alt="">
                </a></li>
            <li class="nav-item nav-toggle">
                
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="background-color: rgb(33,41,54);">
            
            <?php echo \App\Traits\SideBar::sidebar(); ?>

        </ul>
    </div>
</div><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/layout/partial/sidebar.blade.php ENDPATH**/ ?>