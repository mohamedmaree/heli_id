<script>
    $(document).on('click' , '.delete-row', function (e) {
        e.preventDefault()
        Swal.fire({
            title: "<?php echo e(__('هل تريد الاستمرار ؟')); ?>",
            text: "<?php echo e(__('هل انت متأكد انك تريد استكمال عملية الحذف')); ?>",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?php echo e(__('admin.confirm')); ?>',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonText: '<?php echo e(__('admin.cancel')); ?>',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
            }).then( (result) => {
            if (result.value) {
                $.ajax({
                    type: "delete",
                    url: $(this).data('url'),
                    data: {},
                    dataType: "json",
                    success:  (response) => {
                        Swal.fire(
                        {
                            position: 'top-start',
                            type: 'success',
                            title: '<?php echo e(__('admin.the_selected_has_been_successfully_deleted')); ?>',
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        getData({'searchArray' : searchArray()} )
                        // toastr.error()
                        // $('.data-list-view').DataTable().row($(this).closest('td').parent('tr')).remove().draw();
                    }
                });
            }
        })
    });
</script><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/shared/deleteOne.blade.php ENDPATH**/ ?>