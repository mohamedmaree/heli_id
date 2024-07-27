<div class="content-body">
    <div class="table_buttons mb-1">
        <div class="row m-0 justify-content-between">
            <div  >
            <?php if(isset($addbutton)): ?>
                <a href="<?php echo e($addbutton); ?>" class="btn bg-gradient-primary mr-1 mb-1 waves-effect waves-light" ><i class="feather icon-plus"></i> <?php echo e(__('admin.add')); ?></a>
            <?php endif; ?>
            <?php if(isset($deletebutton)): ?>
                <button type="button" data-route="<?php echo e($deletebutton); ?>" class="btn bg-gradient-danger mr-1 mb-1 waves-effect waves-light delete_all_button"><i class="feather icon-trash"></i> <?php echo e(__('admin.delete_selected')); ?></button>
            <?php endif; ?>
            <?php if(isset($extrabuttons)): ?>
                <?php echo e($extrabuttonsdiv); ?>

            <?php endif; ?>
            
            </div>
            <div >
                <div class="dt-buttons print-btns btn-group">
                    <?php if(isset($pdf)): ?>
                        <a target="_blank" href="<?php echo e(route('admin.categories.export')); ?>" class="btn bg-gradient-success buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4">PDF</a> 
                    <?php endif; ?>
                    <?php if(isset($excel)): ?>
                        <a target="_blank" href="<?php echo e(route('admin.categories.export')); ?>" class="btn bg-gradient-success buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4">Excel</a> 
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-2 mb-2">
        <?php if(isset($order)): ?>
            <div class="col-md-3 mt-1 col-12">
                <label for="first-name-column"><?php echo e(__('admin.sort_by')); ?></label>
                <div class="controls ">
                    <i class="fa fa-times clean-input"></i>
                    <select name="order" class="form-control search-input">
                        <option value><?php echo e(__('admin.choose')); ?></option>
                        <option value="ASC"><?php echo e(__('admin.Progressive')); ?></option>
                        <option value="DESC" selected><?php echo e(__('admin.descending')); ?></option>
                    </select>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($datefilter)): ?>
            <div class="col-md-3 mt-1 col-12">
                <label for="first-name-column"><?php echo e(__('admin.beginning_date')); ?></label>
                <div class="controls ">
                    <i class="fa fa-times clean-input"></i>
                    <input type="date" name="created_at_min" class="form-control search-input"   >
                </div>
            </div>
            <div class="col-md-3 mt-1 col-12">
                <label for="first-name-column"><?php echo e(__('admin.end_date')); ?></label>
                <div class="controls ">
                    <i class="fa fa-times clean-input"></i>
                    <input type="date" name="created_at_max" class="form-control search-input"   >
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($searchArray)): ?>
            <?php $__currentLoopData = $searchArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mt-1 col-12">
                    <label for="first-name-column"><?php echo e($value['input_name']); ?></label>
                    <div class="controls ">
                        <i class="fa fa-times clean-input"></i>

                        <?php if($value['input_type'] == 'text'): ?>
                            <input type="text" name="<?php echo e($key); ?>" class="form-control search-input" placeholder="<?php echo e(__('site.write') . $value['input_name']); ?>"  >
                        <?php elseif($value['input_type'] == 'date'): ?>
                            <input type="date" name="<?php echo e($key); ?>" class="form-control search-input" placeholder="<?php echo e(__('site.write') . $value['input_name']); ?>"  >
                        <?php elseif($value['input_type'] == 'time'): ?>
                            <input type="time" name="<?php echo e($key); ?>" class="form-control search-input" placeholder="<?php echo e(__('site.write') . $value['input_name']); ?>"  >
                        <?php elseif($value['input_type'] == 'number'): ?>
                            <input type="number" name="<?php echo e($key); ?>" class="form-control search-input" placeholder="<?php echo e(__('site.write') . $value['input_name']); ?>"  >
                        <?php elseif($value['input_type'] == 'select'): ?>
                            <select name="<?php echo e($key); ?>" class="form-control select2 search-input">
                                <option  value><?php echo e(__('admin.choose')); ?></option>
                                <?php $__currentLoopData = $value['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row['id']); ?>"><?php echo e(isset($value['row_name']) ?  $row[$value['row_name']] : $row['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <?php echo e($tableContent); ?>

</div><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/components/admin/table.blade.php ENDPATH**/ ?>