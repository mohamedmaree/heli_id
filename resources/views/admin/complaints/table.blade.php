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
                <th>{{__('admin.date')}}</th>
                <th>{{__('admin.name_to_complain')}}</th>
                <th>{{__('admin.phone_to_complain')}}</th>
                <th>{{__('admin.email_to_complain')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
                <tr class="delete_complaint">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$complaint->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{\Carbon\Carbon::parse($complaint->created_at)->format('d/m/Y')}}</td>
                    <td>{{$complaint->user_name}}</td>
                    <td>{{$complaint->phone}}</td>
                    <td>{{$complaint->email}}</td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.complaints.show', ['id' => $complaint->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/complaints/' . $complaint->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($complaints->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($complaints->count() > 0 && $complaints instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$complaints->links()}}
    </div>
@endif
{{-- pagination  links div --}}