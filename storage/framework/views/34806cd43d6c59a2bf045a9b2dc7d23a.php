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
                <th><?php echo e(__('admin.image')); ?></th>
                <th><?php echo e(__('admin.name')); ?></th>
                <th><?php echo e(__('admin.email')); ?></th>
                <th><?php echo e(__('admin.phone')); ?></th>
                <th><?php echo e(__('admin.ban_status')); ?></th>
                <th><?php echo e(__('admin.control')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $portfolioimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolioimages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="delete_row">
                    <td class="text-center">
                        <label class="container-checkbox">
                        <input type="checkbox" class="checkSingle" id="<?php echo e($portfolioimages->id); ?>">
                        <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><img src="<?php echo e($portfolioimages->image); ?>" width="30px" height="30px" alt=""></td>
                    <td><?php echo e($portfolioimages->name); ?></td>
                    <td><?php echo e($portfolioimages->email); ?></td>
                    <td><?php echo e($portfolioimages->phone); ?></td>
                    <td>
                        <?php if($portfolioimages->is_blocked): ?>
                        <span class="btn btn-sm round btn-outline-danger">
                            <?php echo e(__('admin.Prohibited')); ?> <i class="la la-close font-medium-2"></i>
                        </span>
                        <?php else: ?>
                        <span class="btn btn-sm round btn-outline-success">
                            <?php echo e(__('admin.Unspoken')); ?> <i class="la la-check font-medium-2"></i>
                        </span>
                        <?php endif; ?>
                    </td>
                    
                    <td class="product-action"> 
                        <span class="text-primary"><a href="<?php echo e(route('admin.portfolioimages.show', ['id' => $portfolioimages->id])); ?>" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> <?php echo e(__('admin.show')); ?></a></span>
                        <span class="action-edit text-primary"><a href="<?php echo e(route('admin.portfolioimages.edit', ['id' => $portfolioimages->id])); ?>" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i><?php echo e(__('admin.edit')); ?></a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="<?php echo e(url('admin/portfolioimages/' . $portfolioimages->id)); ?>"><i class="feather icon-trash"></i><?php echo e(__('admin.delete')); ?></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    
    <?php if($portfolioimages->count() == 0): ?>
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="<?php echo e(asset('admin/app-assets/images/pages/404.png')); ?>" alt="">
            <span class="mt-2" style="font-family: cairo"><?php echo e(__('admin.there_are_no_matches_matching')); ?></span>
        </div>
    <?php endif; ?>
    

</div>

<?php if($portfolioimages->count() > 0 && $portfolioimages instanceof \Illuminate\Pagination\AbstractPaginator ): ?>
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($portfolioimages->links()); ?>

    </div>
<?php endif; ?>


<?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/portfolioimages/table.blade.php ENDPATH**/ ?>