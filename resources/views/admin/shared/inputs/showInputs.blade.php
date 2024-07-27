@if(isset($inputs))
    @foreach ($inputs as $inputName => $input)
        
        {{--  single image input  --}}
        @if($input['input'] == 'image')
            <div class="col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                <div class="imgMontg col-12 text-center ">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                @if(isset($input['text']))
                                    <h6>{{$input['text']}}</h6>
                                @endif
                                <label class="uploadImg">
                                    <span><i class="feather icon-image"></i></span>
                                    <input type="file" accept="image/*" class="imageUploader"
                                    disabled
                                    @if(isset($input['attributes']))
                                        @foreach ($input['attributes'] as $key => $value)
                                            {{$key}}="{{$value}}"
                                        @endforeach
                                    @endif
                                    >
                                </label>
                                <div class="uploadedBlock">
                                    <img src="{{$item[$inputName]}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{--  create multiple files uploader  --}}
        @elseif ($input['input'] == 'files')
        <div class="  col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
            <div class="form-group">
                <label for="first-name-column">{{$input['text']}}</label>
                {{--  <div class="controls">
                    <input
                        type="file"
                        multiple
                        name="{{$inputName}}[]" 
                        id="{{$inputName}}_input"
                        class="form-control"
                        onchange="uploadFiles(event ,'{{$inputName}}')"
                        placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : __('admin.enter') . ' ' . $input['text']}}" 
                        
                        {{(isset($input['validation']) && $input['validation'] != false && $input['validation']['type'] == 'required ') ? 'required  data-validation-required-message="' . __('admin.this_field_is_required') . '"' : ''}}
                        @if(isset($input['validation']) && $input['validation'] != false)
                            data-validation-{{$input['validation']['type']}}-message='{{$input['validation']['message']}}'
                        @elseif (!isset($input['validation']))
                            required
                            data-validation-required-message='{{__('admin.this_field_is_required')}}' 
                        @endif
                        
                        @if(isset($input['attributes']))
                            @foreach ($input['attributes'] as $key => $value)
                                {{$key}}="{{$value}}"
                            @endforeach
                        @endif
                    >
                </div>  --}}
                <div class="col-12 p-0 ">
                    <div class="files_uploader_container  p-2" id="{{$inputName}}_cont">
                        @foreach ($input['files']['array'] as $file)
                        @if( in_array(explode('.' ,$file[$input['files']['value']])[count(explode('.' ,$file[$input['files']['value']])) - 1] ,['jpg' ,'JPG' ,'png' ,'PNG' ,'jpeg' ,'JPEG' ,'SVG' ,'svg' ,'TIFF' ,'tiff' ,'webp' ,'WEBP']))

                                <div class="files_uploader_element" >
                                    <div>
                                        <div><img src="{{$file[$input['files']['value']]}}" alt=""></div>
                                    </div>
                        
                                </div>
                                @else
                                <div class="files_uploader_element " >
                                    <div>
                                        <div class="element_text"> <span class="m-1" style="font-size:20px"><i class="fa fa-file"></i></span>$file[$input['files']['name']]</div>
                                    </div>
                        
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        {{--  create ar and en inputs  --}}
        @elseif ($input['input'] == 'input_ar_en')
            @foreach (languages() as $lang)
                <div class="col-md-6  col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                    <div class="form-group">
                        <label for="first-name-column">{{$input['text'][$lang] ? $input['text'][$lang] : $input['text']}}</label>
                        <div class="controls">
                            <input 
                                value="{{$item->getTranslations($inputName)[$lang]}}"
                                type="{{isset($input['type']) ? $input['type'] : 'text'}}"  
                                disabled
                                class="form-control" 


                                @if(isset($input['attributes']))
                                    @foreach ($input['attributes'] as $key => $value)
                                        {{$key}}="{{$value}}"
                                    @endforeach
                                @endif
                            >
                        </div>
                    </div>
                </div>
            @endforeach



        {{--  create normal input  --}}
        @elseif ($input['input'] == 'input')
            <div class="col-md-6  col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                <div class="form-group">
                    <label for="first-name-column">{{$input['text']}}</label>
                    <div class="controls">
                        <input
                        @if(isset($input['type']) && $input['type'] == 'password') @else value="{{$item[$inputName]}}"@endif
                            type="{{isset($input['type']) ? $input['type'] : 'text'}}"  
                            disabled 
                            class="form-control" 
                            
                            @if(isset($input['attributes']))
                                @foreach ($input['attributes'] as $key => $value)
                                    {{$key}}="{{$value}}"
                                @endforeach
                            @endif
                        >
                    </div>
                </div>
            </div>




        {{--  create ar and en textarea  --}}
        @elseif ($input['input'] == 'textarea_ar_en')
            @foreach (languages() as $lang)
                <div class="col-md-6  col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                    <div class="form-group">
                        <label for="first-name-column">{{$input['text'][$lang] ? $input['text'][$lang] : $input['text']}}</label>
                        <div class="controls">
                            <textarea 
                                disabled 
                                class="form-control"

                                {{!isset($input['attributes']['rows']) ? 'rows=6' : ''}}

                                @if(isset($input['attributes']))
                                    @foreach ($input['attributes'] as $key => $value)
                                        {{$key}}="{{$value}}"
                                    @endforeach
                                @endif
                        >
                            @if(isset($input['ckeditor']) && $input['ckeditor']) {!!$item->getTranslations($inputName)[$lang]!!} @else {{$item->getTranslations($inputName)[$lang]}} @endif
                        </textarea>
                        @if(isset($input['ckeditor']) && $input['ckeditor'] === true)
                            <div class="error {{$inputName}} {{$lang}}"></div>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach



        {{--  create normal textarea  --}}
        @elseif ($input['input'] == 'textarea')
            <div class="col-md-6  col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                <div class="form-group">
                    <label for="first-name-column">{{$input['text']}}</label>
                    <div class="controls">
                        <textarea
                            disabled
                            class="form-control" 
                            
                            {{!isset($input['attributes']['rows']) ? 'rows=6' : ''}}
                            @if(isset($input['attributes']))
                                @foreach ($input['attributes'] as $key => $value)
                                    {{$key}}="{{$value}}"
                                @endforeach
                            @endif
                    >
                        @if(isset($input['ckeditor']) && $input['ckeditor']) {!!$item[$inputName]!!} @else {{$item[$inputName]}} @endif
                    </textarea>
                    @if(isset($input['ckeditor']) && $input['ckeditor'] === true)
                        <div class="error {{$inputName}}"></div>
                    @endif
                    </div>
                </div>
            </div>





        {{--  create normal select input  --}}
        @elseif ($input['input'] == 'single_select')
            <div class=" col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                <div class="form-group">
                    <label for="first-name-column">{{$input['text']}}</label>
                    <div class="controls">
                        <select 
                            disabled
                            class="select2 form-control" 

                            @if(isset($input['attributes']))
                                @foreach ($input['attributes'] as $key => $value)
                                    {{$key}}="{{$value}}"
                                @endforeach
                            @endif
                        >

                            @foreach ($input['options']['array'] as $option)
                                <option {{$option[$input['options']['value']] == $item[$inputName] ? 'selected' : ''}} value="{{$option[$input['options']['value']]}}">{{$option[$input['options']['text']]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


        @elseif ($input['input'] == 'multiple_select')
            <div class="col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                <div class="form-group">
                    <label for="first-name-column">{{$input['text']}}</label>
                    <div class="controls">
                        <select 
                            multiple
                            disabled
                            class="select2 {{$inputName}}-multiple form-control" 


                            @if(isset($input['attributes']))
                                @foreach ($input['attributes'] as $key => $value)
                                    {{$key}}="{{$value}}"
                                @endforeach
                            @endif
                        >
                            @foreach ($input['options']['array'] as $option)
                                <option {{in_array($option[$input['options']['value']] ,$item[$inputName]->pluck([$input['options']['value']])->toArray()) ? 'selected' : ''}} value="{{$option[$input['options']['value']]}}">{{$option[$input['options']['text']]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        @elseif ($input['input'] == 'seo')
            <h5 class="w-100 pt-5 px-3 pb-2">{{__('admin.add_seo')}}</h5>
                @foreach (languages() as $lang)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('site.meta_title_'.$lang) }}</label>
                            <div class="controls">
                                <textarea disabled class="form-control" placeholder="{{__('site.write') . __('site.meta_title_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" cols="30" rows="10">{{$item->getTranslations('meta_title')[$lang] ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach (languages() as $lang)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('site.meta_description_'.$lang) }}</label>
                            <div class="controls">
                                <textarea disabled class="form-control" placeholder="{{__('site.write') . __('site.meta_description_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" cols="30" rows="10">{{$item->getTranslations('meta_description')[$lang] ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach (languages() as $lang)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('site.meta_keywords_'.$lang) }}</label>
                            <div class="controls">
                                <textarea disabled class="form-control" placeholder="{{__('site.write') . __('site.meta_keywords_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" cols="30" rows="10">{{$item->getTranslations('meta_keywords')[$lang] ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
        @elseif ($input['input'] == 'map')
            <div class="col-md-6  col-12 {{isset($input['col_md']) ? ' col-md-' . $input['col_md'] : ' '}}">
                    <div>
                        <div class="form-group {{$input['map_address'] === null ? 'd-none' : ''}}">
                            <label for="commercial_number">{{__('admin.address')}}</label>
                            <div class="controls">
                                <input type="text" id="address" class="form-control"
                                @if (isset($input['map_address']) && $item[$input['map_address']['name']] !== null)
                                    value="{{$item[$input['map_address']['name']]}}"
                                @endif


                                @if(isset($input['attributes']))
                                    @foreach ($input['attributes'] as $key => $value)
                                        {{$key}}="{{$value}}"
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >{{$input['text']}}</label>
                        <input type="text" id="mapSearch" class="form-control" placeholder="{{__('admin.search_in_map')}}" >

                        <div class="form-group">
                            <div id="map" style="width: 100%;height:250px;"></div>
                            <input type="hidden"  name="lat" id="lat" >
                            <input type="hidden"  name="lng" id="lng" >
                        </div>
                    </div>
                </div>
    
        @elseif ($input['input'] == 'custom')
            @yield($inputName)
        @endif
    @endforeach
    @else
    @dd('the inputs array not found !')
    @endif