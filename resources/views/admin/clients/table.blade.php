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
                <th>
                    <label class="container-checkbox">
                        <input type="checkbox" value="value1" name="name1" id="checkedAll">
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th>{{ __('admin.image') }}</th>
                <th>{{ __('admin.name') }}</th>
                <th>{{ __('admin.email') }}</th>
                <th>{{ __('admin.phone') }}</th>
                <th>{{ __('admin.ban_status') }}</th>
                <th>{{ __('admin.activation') }}</th>
                <th>{{ __('admin.control') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr class="delete_row">
                <td class="text-center">
                    <label class="container-checkbox">
                    <input type="checkbox" class="checkSingle" id="{{ $row->id }}">
                    <span class="checkmark"></span>
                    </label>
                </td>
                <td><img src="{{$row->image}}" width="30px" height="30px" alt=""></td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone }}</td>
                <td>
                    @if ($row->is_blocked)
                        <span class="btn btn-sm round btn-outline-danger">
                            {{ __('admin.Prohibited')  }} <i class="la la-close font-medium-2"></i>
                        </span>
                        {{-- <span class="btn btn-sm round btn-outline-success block_user" data-id="{{$row->id}}">{{__('admin.unblock')}}</span> --}}
                    @else
                        <span class="btn btn-sm round btn-outline-success">
                            {{ __('admin.Unspoken') }} <i class="la la-check font-medium-2"></i>
                        </span>
                        {{-- <span class="btn btn-sm round btn-outline-danger block_user" data-id="{{$row->id}}">{{__('admin.block')}}</span> --}}
                    @endif
                </td>
                <td>
                    @if ($row->active)
                    <span class="btn btn-sm round btn-outline-success">
                        {{ __('admin.activate') }} <i class="la la-close font-medium-2"></i>
                    </span>
                    @else
                    <span class="btn btn-sm round btn-outline-danger">
                        {{ __('admin.dis_activate') }} <i class="la la-check font-medium-2"></i>
                    </span>
                    @endif
                </td>
                <td class="product-action">
                    <span class="text-primary"><a href="{{ route('admin.clients.show', ['id' => $row->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                    <span class="action-edit text-primary"><a href="{{ route('admin.clients.edit', ['id' => $row->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                     <span data-toggle="modal" data-target="#notify" class="notify btn btn-info btn-sm" data-id="{{ $row->id }}" data-url="{{ url('admins/clients/notify') }}"><i class="feather icon-bell"></i>{{ __('admin.notify') }}</span>
                    {{--<span data-toggle="modal" data-target="#mail" class=" mail"
                        data-id="{{ $row->id }}"
                        data-url="{{ url('admins/clients/notify') }}"><i
                        class="feather icon-mail"></i></span>
                    <span data-toggle="modal" data-target="#sms" class=" sms"
                        data-id="{{ $row->id }}"
                        data-url="{{ url('admins/clients/notify') }}"><i
                        class="feather icon-phone"></i></span> --}}
                    <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/clients/' . $row->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($rows->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($rows->count() > 0 && $rows instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$rows->links()}}
    </div>
@endif
{{-- pagination  links div --}}

