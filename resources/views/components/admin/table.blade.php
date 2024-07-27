<div class="content-body">
    <div class="table_buttons mb-1">
        <div class="row m-0 justify-content-between">
            <div  >
            @isset($addbutton)
                <a href="{{$addbutton}}" class="btn bg-gradient-primary mr-1 mb-1 waves-effect waves-light" ><i class="feather icon-plus"></i> {{__('admin.add')}}</a>
            @endisset
            @isset($deletebutton)
                <button type="button" data-route="{{$deletebutton}}" class="btn bg-gradient-danger mr-1 mb-1 waves-effect waves-light delete_all_button"><i class="feather icon-trash"></i> {{__('admin.delete_selected')}}</button>
            @endisset
            @isset($extrabuttons)
                {{$extrabuttonsdiv}}
            @endif
            {{-- <button type="button" class="reload btn bg-gradient-warning mr-1 mb-1 waves-effect waves-light"><i class="feather icon-refresh-cw"></i> {{__('admin.update')}}</button> --}}
            </div>
            <div >
                <div class="dt-buttons print-btns btn-group">
                    @isset($pdf)
                        <a target="_blank" href="{{route('admin.categories.export')}}" class="btn bg-gradient-success buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4">PDF</a> 
                    @endif
                    @isset($excel)
                        <a target="_blank" href="{{route('admin.categories.export')}}" class="btn bg-gradient-success buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4">Excel</a> 
                    @endif

                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-2 mb-2">
        @isset($order)
            <div class="col-md-3 mt-1 col-12">
                <label for="first-name-column">{{__('admin.sort_by')}}</label>
                <div class="controls ">
                    <i class="fa fa-times clean-input"></i>
                    <select name="order" class="form-control search-input">
                        <option value>{{__('admin.choose')}}</option>
                        <option value="ASC">{{__('admin.Progressive')}}</option>
                        <option value="DESC" selected>{{__('admin.descending')}}</option>
                    </select>
                </div>
            </div>
        @endisset
        @isset($datefilter)
            <div class="col-md-3 mt-1 col-12">
                <label for="first-name-column">{{__('admin.beginning_date')}}</label>
                <div class="controls ">
                    <i class="fa fa-times clean-input"></i>
                    <input type="date" name="created_at_min" class="form-control search-input"   >
                </div>
            </div>
            <div class="col-md-3 mt-1 col-12">
                <label for="first-name-column">{{__('admin.end_date')}}</label>
                <div class="controls ">
                    <i class="fa fa-times clean-input"></i>
                    <input type="date" name="created_at_max" class="form-control search-input"   >
                </div>
            </div>
        @endisset
        @isset($searchArray)
            @foreach ($searchArray as $key => $value)
                <div class="col-md-3 mt-1 col-12">
                    <label for="first-name-column">{{$value['input_name']}}</label>
                    <div class="controls ">
                        <i class="fa fa-times clean-input"></i>

                        @if ($value['input_type'] == 'text')
                            <input type="text" name="{{$key}}" class="form-control search-input" placeholder="{{__('site.write') . $value['input_name']}}"  >
                        @elseif ($value['input_type'] == 'date')
                            <input type="date" name="{{$key}}" class="form-control search-input" placeholder="{{__('site.write') . $value['input_name']}}"  >
                        @elseif ($value['input_type'] == 'time')
                            <input type="time" name="{{$key}}" class="form-control search-input" placeholder="{{__('site.write') . $value['input_name']}}"  >
                        @elseif ($value['input_type'] == 'number')
                            <input type="number" name="{{$key}}" class="form-control search-input" placeholder="{{__('site.write') . $value['input_name']}}"  >
                        @elseif ($value['input_type'] == 'select')
                            <select name="{{$key}}" class="form-control select2 search-input">
                                <option  value>{{__('admin.choose')}}</option>
                                @foreach ($value['rows'] as $row)
                                    <option value="{{$row['id']}}">{{ isset($value['row_name']) ?  $row[$value['row_name']] : $row['name']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
    {{$tableContent}}
</div>