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
                <th><?php echo e(__('admin.job')); ?></th>
                <th><?php echo e(__('admin.control')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="delete_row">
                    <td class="text-center">
                        <label class="container-checkbox">
                        <input type="checkbox" class="checkSingle" id="<?php echo e($team->id); ?>">
                        <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><img src="<?php echo e($team->image); ?>" width="30px" height="30px" alt=""></td>
                    <td><?php echo e($team->name); ?></td>
                    <td><?php echo e($team->job); ?></td>
                    
                    <td class="product-action"> 
                        <span class="text-primary"><a href="<?php echo e(route('admin.teams.show', ['id' => $team->id])); ?>" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> <?php echo e(__('admin.show')); ?></a></span>
                        <span class="action-edit text-primary"><a href="<?php echo e(route('admin.teams.edit', ['id' => $team->id])); ?>" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i><?php echo e(__('admin.edit')); ?></a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="<?php echo e(url('admin/teams/' . $team->id)); ?>"><i class="feather icon-trash"></i><?php echo e(__('admin.delete')); ?></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    
    <?php if($teams->count() == 0): ?>
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="<?php echo e(asset('admin/app-assets/images/pages/404.png')); ?>" alt="">
            <span class="mt-2" style="font-family: cairo"><?php echo e(__('admin.there_are_no_matches_matching')); ?></span>
        </div>
    <?php endif; ?>
    

</div>

<?php if($teams->count() > 0 && $teams instanceof \Illuminate\Pagination\AbstractPaginator ): ?>
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($teams->links()); ?>

    </div>
<?php endif; ?>


<?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/teams/table.blade.php ENDPATH**/ ?>