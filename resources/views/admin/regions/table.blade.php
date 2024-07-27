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
                <th>{{__('admin.name')}}</th>
                <th>{{__('admin.country')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $region)
                <tr class="delete_row">

                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$region->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{\Carbon\Carbon::parse($region->created_at)->format('d/m/Y')}}</td>
                    <td>{{ $region->name }}</td>
                    <td>{{ $region->country->name }}</td>
                    
                    
                    <td class="product-action"> 
                        <span class="text-primary"><a href="{{ route('admin.regions.show', ['id' => $region->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                        <span class="action-edit text-primary"><a href="{{ route('admin.regions.edit', ['id' => $region->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/regions/' . $region->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($regions->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($regions->count() > 0 && $regions instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$regions->links()}}
    </div>
@endif
{{-- pagination  links div --}}

