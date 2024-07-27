<script>
    $(document).ready(function(){
        $('.files_uploader_delete_file.update').on('click',function(e){
            e.preventDefault();
            if (confirm("{{__('admin.do_you_want_to_delete_the_item')}}")) {
                $.ajax({
                    url: $(this).data('url'),
                    method: 'post',
                    data: {
                        '_token' : "{{csrf_token()}}",
                        'id'     : $(this).data('id')
                    },
                    success: (response) => {
                        $(this).parent().remove();
                        Swal.fire({
                            position: 'top-start',
                            type: 'success',
                            title: '{{__('admin.the_item_was_deleted')}}',
                            timer: 1500,
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            position: 'top-start',
                            type: 'error',
                            title: '{{__('admin.an_error_occurred')}}',
                            timer: 1500,
                        })
                    },
                });
            }
        });
    });
</script>