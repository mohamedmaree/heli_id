@if(Session::has('success'))
    <script>
        toastr.success('{{ Session::get('success') }}');
    </script>

    @elseif(Session::has('danger'))
    <script>
        toastr.error('{{ Session::get('danger') }}');
    </script>
@endif


@if (count($errors) > 0)
    <script>
        @foreach(array_reverse($errors->all()) as $error)
            toastr.error('{{$error}}');
        @endforeach
    </script>
@endif

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

