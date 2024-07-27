<?php if(Session::has('success')): ?>
    <script>
        toastr.success('<?php echo e(Session::get('success')); ?>');
    </script>

    <?php elseif(Session::has('danger')): ?>
    <script>
        toastr.error('<?php echo e(Session::get('danger')); ?>');
    </script>
<?php endif; ?>


<?php if(count($errors) > 0): ?>
    <script>
        <?php $__currentLoopData = array_reverse($errors->all()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error('<?php echo e($error); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    $( document ).ajaxSuccess(function( event, request, settings ,response ) {
        if (response.type == 'notAuth') {
            toastr.error(response.msg)
        }
    });
</script>

<?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/components/admin/alert.blade.php ENDPATH**/ ?>