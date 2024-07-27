<div class="position-relative">
    
    
    
    
    <table class="table " id="tab">
        <thead>
            <tr>
                <th>
                    <label class="container-checkbox">
                        <input type="checkbox" value="value1" name="name1" id="checkedAll">
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th><?php echo e(__('admin.address')); ?></th>
                <th><?php echo e(__('admin.short_description')); ?></th>
                <th><?php echo e(__('admin.control')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="delete_service">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="<?php echo e($service->id); ?>">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><?php echo e($service->title); ?></td>
                    <td><?php echo e($service->short_description); ?></td>
                    <td class="product-action">
                        <span class="text-primary"><a href="<?php echo e(route('admin.introservices.show', ['id' => $service->id])); ?>" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> <?php echo e(__('admin.show')); ?></a></span>
                        <span class="action-edit text-primary"><a href="<?php echo e(route('admin.introservices.edit', ['id' => $service->id])); ?>" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i><?php echo e(__('admin.edit')); ?></a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="<?php echo e(url('admin/introservices/' . $service->id)); ?>"><i class="feather icon-trash"></i><?php echo e(__('admin.delete')); ?></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    
    <?php if($services->count() == 0): ?>
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="<?php echo e(asset('admin/app-assets/images/pages/404.png')); ?>"alt="">
            <span class="mt-2" style="font-family: cairo"><?php echo e(__('admin.there_are_no_matches_matching')); ?></span>
        </div>
    <?php endif; ?>
    

</div>

<?php if($services->count() > 0 && $services instanceof \Illuminate\Pagination\AbstractPaginator ): ?>
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($services->links()); ?>

    </div>
<?php endif; ?>
<?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/introservices/table.blade.php ENDPATH**/ ?>