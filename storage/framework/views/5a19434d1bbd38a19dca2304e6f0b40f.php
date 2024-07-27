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
                <th><?php echo e(__('admin.*')); ?></th>
                
                <th><?php echo e(__('admin.ip')); ?></th>
                <th><?php echo e(__('admin.date')); ?></th>
                <th><?php echo e(__('admin.control')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="delete_report">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="<?php echo e($report->id); ?>">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><?php echo e($report->subject); ?></td>
                    
                    <td><?php echo e($report->ip); ?></td>
                    <td><?php echo e($report->created_at); ?></td>
                    <td class="product-action">
                        <span class="text-primary"><a href="<?php echo e(route('admin.reports.show', ['id' => $report->id])); ?>" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> <?php echo e(__('admin.show')); ?></a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="<?php echo e(url('admin/reports/' . $report->id)); ?>"><i class="feather icon-trash"></i><?php echo e(__('admin.delete')); ?></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    
    <?php if($reports->count() == 0): ?>
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="<?php echo e(asset('admin/app-assets/images/pages/404.png')); ?>" alt="">
            <span class="mt-2" style="font-family: cairo"><?php echo e(__('admin.there_are_no_matches_matching')); ?></span>
        </div>
    <?php endif; ?>
    

</div>

<?php if($reports->count() > 0 && $reports instanceof \Illuminate\Pagination\AbstractPaginator ): ?>
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($reports->links()); ?>

    </div>
<?php endif; ?>
<?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/reports/table.blade.php ENDPATH**/ ?>