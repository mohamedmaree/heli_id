<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/index_page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginal781089cd478f3e09d520a65f160df974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal781089cd478f3e09d520a65f160df974 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Table::resolve(['datefilter' => 'true','order' => 'true','addbutton' => ''.e(route('admin.introservices.create')).'','deletebutton' => ''.e(route('admin.introservices.deleteAll')).'','searchArray' => [
        'title' => [
            'input_type' => 'text' , 
            'input_name' => __('admin.address') , 
        ] ,
        'description' => [
            'input_type' => 'text' , 
            'input_name' => __('admin.description') , 
        ] ,
        
    ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('tableContent', null, []); ?> 
        <div class="table_content_append card">

        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal781089cd478f3e09d520a65f160df974)): ?>
<?php $attributes = $__attributesOriginal781089cd478f3e09d520a65f160df974; ?>
<?php unset($__attributesOriginal781089cd478f3e09d520a65f160df974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal781089cd478f3e09d520a65f160df974)): ?>
<?php $component = $__componentOriginal781089cd478f3e09d520a65f160df974; ?>
<?php unset($__componentOriginal781089cd478f3e09d520a65f160df974); ?>
<?php endif; ?>


    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')); ?>"></script>

    
        <?php echo $__env->make('admin.shared.deleteAll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
        <?php echo $__env->make('admin.shared.deleteOne', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
        <?php echo $__env->make('admin.shared.filter_js' , [ 'index_route' => url('admin/introservices')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/introservices/index.blade.php ENDPATH**/ ?>