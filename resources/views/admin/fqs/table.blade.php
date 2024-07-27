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
                <th>{{__('admin.question')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fqss as $fqs)
                <tr class="delete_fqs">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$fqs->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{$fqs->question}}</td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.fqs.show', ['id' => $fqs->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                        <span class="action-edit text-primary"><a href="{{ route('admin.fqs.edit', ['id' => $fqs->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/fqs/' . $fqs->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($fqss->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($fqss->count() > 0 && $fqss instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$fqss->links()}}
    </div>
@endif
{{-- pagination  links div --}}