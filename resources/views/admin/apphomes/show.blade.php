@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.view') . ' ' . __('admin.apphome')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form  class="show form-horizontal" >
                            <div class="form-body">
                                <div class="row">
                                    
                                    {{-- to create languages tabs uncomment that --}}
                                    <div class="col-12">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs  mb-3">
                                                    @foreach (languages() as $lang)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#first_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                                                        </li>
                                                    @endforeach
                                            </ul>
                                        </div> 

                                        <div class="tab-content">
                                                @foreach (languages() as $lang)
                                                    <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="first_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">{{__('admin.title')}} {{ $lang }}</label>
                                                                <div class="controls">
                                                                    <input type="text" value="{{$apphome->getTranslations('title')[$lang]??''}}" name="title[{{$lang}}]" class="form-control" placeholder="{{__('admin.write') . __('admin.title')}} {{ $lang }}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="description">{{ __('admin.description') }} {{ $lang }}</label>
                                                                    <textarea class="form-control" name="description[{{$lang}}]" id="description" cols="30" rows="10"
                                                                        placeholder="{{__('admin.write') . __('admin.description')}} {{ $lang }}" >{{ $apphome->getTranslations('description')[$lang]??'' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                       {{--  to create languages tabs uncomment that --}}
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.type') }}</label>
                                                <div class="controls">
                                                    <select name="type" id="type" class="select2 form-control" required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                        <option value>{{ __('admin.type') }}</option>
                                                        <option value="categories" {{ $apphome->type == 'categories' ? 'selected' : ''}} >{{ __('admin.sections') }}</option>
                                                        <option value="ads"     {{ $apphome->type == 'ads' ? 'selected' : ''}} >{{ __('admin.advertising_banners') }}</option>
                                                        <option value="description" {{ $apphome->type == 'description' ? 'selected' : ''}} >{{ __('admin.description') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.sort') }}</label>
                                                <div class="controls">
                                                    <input type="number" name="sort" value="{{ $apphome->sort }}" class="form-control" min="1"
                                                        placeholder="{{ __('admin.sort') }}" >
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.add_dates')}} :</label>
                                                {{-- <div class="controls"> --}}
                                                    <label class="switch">
                                                        <input name="add_dates" id="add_dates" type="checkbox" value="1" {{ $apphome->add_dates == '1' ? 'checked' : ''}}/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 date">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.start_at') }}</label>
                                                <div class="controls">
                                                    <input type="date" name="start_at" value="{{ $apphome->start_at }}" class="form-control"
                                                        placeholder="{{ __('admin.start_at') }}" >
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 col-12 date">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.end_at') }}</label>
                                                <div class="controls">
                                                    <input type="date" name="end_at" value="{{ $apphome->end_at }}" class="form-control" 
                                                        placeholder="{{ __('admin.end_at') }}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.display_type') }}</label>
                                                <div class="controls">
                                                    <select name="display_type" id="display_type" class="select2 form-control" required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                        <option value>{{ __('admin.display_type') }}</option>
                                                        <option value="carousel" {{ $apphome->display_type == 'carousel' ? 'selected':''  }}>{{ __('admin.carousel') }}</option>
                                                        <option value="grid" {{ $apphome->display_type == 'grid' ? 'selected':''  }}>{{ __('admin.grid') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 grid_columns_count">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.grid_columns_count') }}</label>
                                                <div class="controls">
                                                    <input type="number" name="grid_columns_count" value="{{ $apphome->grid_columns_count }}"  class="form-control" min="1"
                                                        placeholder="{{ __('admin.grid_columns_count') }}" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12 records">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.records')}}</label>
                                            <div class="controls">
                                                <select name="records[]" id="records" class="select2 form-control" multiple>
                                                    <option value>{{__('admin.records')}}</option>
                                                    @if(isset($records))
                                                        @foreach ($records as $record)
                                                            <option value="{{$record->id}}" @if (in_array($record->id,$apphome->records))) selected @endif >{{$record->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    <script>
        $('.show input').attr('disabled' , true)
        $('.show textarea').attr('disabled' , true)
        $('.show select').attr('disabled' , true)
    </script>
        <script>
            var add_dates = "{{ $apphome->add_dates }}";
            if(add_dates == '0'){
                $('.date').hide();
            } 
            
            var display_type = "{{ $apphome->display_type }}";
            if(display_type != 'grid'){
                $('.grid_columns_count').hide();
            } 
    
            var type = "{{ $apphome->type }}";
            if(type == 'description'){
                $('.records').hide();
            } 
            
            </script>
@endsection