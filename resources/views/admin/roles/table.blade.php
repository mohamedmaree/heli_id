<div class="position-relative">
    {{-- table loader  --}}
    {{-- <div class="table_loader" >
        {{__('admin.loading')}}
    </div> --}}
    {{-- table loader  --}}
    {{-- table content --}}
    <table class="table " id="tab">
        <thead>
            <tr>
                <th>#</th>
                <th>{{__('admin.name')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr class="delete_role">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$role->name}}</td>
                    <td class="product-action">
                        <span class="action-edit text-primary"><a href="{{ route('admin.roles.edit', ['id' => $role->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                        @if(auth()->guard('admin')->user()->role->id != $role->id)
                        <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/roles/' . $role->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($roles->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($roles->count() > 0 && $roles instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$roles->links()}}
    </div>
@endif
{{-- pagination  links div --}}