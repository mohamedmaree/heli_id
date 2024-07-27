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
                <th>{{__('admin.image')}}</th>
                <th>{{__('admin.name')}}</th>
                <th>{{__('admin.from_date')}}</th>
                <th>{{__('admin.to_date')}}</th>
                <th>{{__('admin.link')}}</th>
                <th>{{__('admin.sort')}}</th>
                <th>{{__('admin.status')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr class="delete_image">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$image->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><img src="{{$image->image}}" width="30px" height="30px" alt=""></td>
                    <td>{{ $image->name }}</td>
                    <td>{{ $image->start_date }}</td>
                    <td>{{ $image->end_date }}</td>
                    <td><a href="{{ $image->link }}">{{ $image->link }}</a></td>
                    <td>{{ $image->sort }}</td>
                    <td>
                        {!! toggleBooleanView($image , route('admin.model.active' , ['model' =>'Image' , 'id' => $image->id , 'action' => 'is_active'])) !!}
                    </td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.images.show', ['id' => $image->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                        <span class="action-edit text-primary"><a href="{{ route('admin.images.edit', ['id' => $image->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/images/' . $image->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($images->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($images->count() > 0 && $images instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$images->links()}}
    </div>
@endif
{{-- pagination  links div --}}