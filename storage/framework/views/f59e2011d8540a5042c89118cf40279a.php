
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">
                <?php echo e(__('admin.Copyrights')); ?> &copy; <?php echo e(\Carbon\Carbon::now()->year); ?>

                <a class="text-bold-800 grey darken-2" href="mailto:m7mdmaree26@gmail.com" target="_blank">,</a>
                <?php echo e(__('admin.all_rights_reserved')); ?>

            </span>
            <span class="float-md-right d-none d-md-block"> 
                <?php echo e(__('admin.programming_design')); ?>

                <a href="mailto:m7mdmaree26@gmail.com" rel="follow" target="_blank"> <?php echo e(__('site.maree')); ?></a>
                <a href="mailto:m7mdmaree26@gmail.com" ><i class="feather icon-mail pink"></i></a> 
                <a href="tel:+201002700084" ><i class="feather icon-phone pink"></i></a> 
            </span>
        </p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="<?php echo e(asset('admin/active.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/core/app.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/components.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/extensions/toastr.min.js')); ?>"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        // input date js
        var $list = $(":input[type='date']");
        $(window).on('load', function () {
            if ($($list).length > 0) {
                $(document).find($list).addClass("custom-input-date");
                $(document).find($list).parents(".controls").addClass("parent-input-date");
                $($list).prop("type", "text");
                flatpickr($list, {
                    disableMobile: true,
                    // minDate: "today",
                });
            }
        })
        $(document).ready(function () {
            $(".select2").select2();  
        });
    </script>

    <?php echo $__env->yieldContent('js'); ?>

    <?php if (isset($component)) { $__componentOriginal07ddb047ae3451301e07dda88a33c35d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07ddb047ae3451301e07dda88a33c35d = $attributes; } ?>
<?php $component = App\View\Components\Admin\Alert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07ddb047ae3451301e07dda88a33c35d)): ?>
<?php $attributes = $__attributesOriginal07ddb047ae3451301e07dda88a33c35d; ?>
<?php unset($__attributesOriginal07ddb047ae3451301e07dda88a33c35d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07ddb047ae3451301e07dda88a33c35d)): ?>
<?php $component = $__componentOriginal07ddb047ae3451301e07dda88a33c35d; ?>
<?php unset($__componentOriginal07ddb047ae3451301e07dda88a33c35d); ?>
<?php endif; ?>
    
</body>
</html><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/layout/partial/footer.blade.php ENDPATH**/ ?>