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
                                    <input type="file" accept="image/*" name="{{$inputName}}" class="imageUploader"

                                    @if(isset($input['validation']) && $input['validation'] != false)
                                        @foreach ($input['validation'] as $singleValidation)
                                            @if(isset($singleValidation['value']))
                                            {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                            @else
                                            {{$singleValidation['type']}}
                                            @endif
                                            data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                        @endforeach
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
                                </label>
                                <div class="uploadedBlock">
                                    <img src="{{$item[$inputName]}}">
                                    <button class="close"><i class="feather icon-x"></i></button>
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
                <div class="controls">
                    <input
                        type="file"
                        multiple
                        name="{{$inputName}}[]" 
                        id="{{$inputName}}_input"
                        class="form-control files-input"
                        data-input="{{$inputName}}"
                        {{--  onchange="uploadFiles(event ,'{{$inputName}}')"  --}}
                        placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : __('admin.enter') . ' ' . $input['text']}}" 
                    
                        @if(isset($input['validation']) && $input['validation'] != false)
                            @foreach ($input['validation'] as $singleValidation)
                                @if(isset($singleValidation['value']))
                                {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                @else
                                {{$singleValidation['type']}}
                                @endif
                                data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                            @endforeach
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
                </div>
                <div class="col-12 p-0 ">
                    <div class="files_uploader_container  p-2" id="{{$inputName}}_cont">
                        @foreach ($input['files']['array'] as $file)
                            {{--  <option {{$option[$input['options']['value']] == $item[$inputName] ? 'selected' : ''}} value="{{$option[$input['options']['value']]}}">{{$option[$input['options']['text']]}}</option>  --}}
                            @if( in_array(explode('.' ,$file[$input['files']['value']])[count(explode('.' ,$file[$input['files']['value']])) - 1] ,['jpg' ,'JPG' ,'png' ,'PNG' ,'jpeg' ,'JPEG' ,'SVG' ,'svg' ,'TIFF' ,'tiff' ,'webp' ,'WEBP']))
                                <div class="files_uploader_element" >
                                    <div>
                                        <div><img src="{{$file[$input['files']['value']]}}" alt=""></div>
                                    </div>
                                    <div class="files_uploader_delete_file update" data-url="{{$input['files']['url'] ?? ''}}" data-id="{{$file['id']}}">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </div>
                            @else
                                <div class="files_uploader_element " >
                                    <div>
                                        <div class="element_text"> <span class="m-1" style="font-size:20px"><i class="fa fa-file"></i></span>$file[$input['files']['name']]</div>
                                    </div>
                                    <div class="files_uploader_delete_file update" data-url="{{$input['files']['url'] ?? ''}}" data-id="{{$file['id']}}">
                                        <i class="fa fa-trash"></i>
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
                                name="{{$inputName}}[{{$lang}}]" 
                                class="form-control" placeholder="{{isset($input['placeholder']) ? $input['placeholder'][$lang] : __('admin.enter') . ' ' . $input['text'][$lang]}}" 
                                
                                @if(isset($input['validation']) && $input['validation'] != false)
                                    @foreach ($input['validation'] as $singleValidation)
                                        @if(isset($singleValidation['value']))
                                        {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                        @else
                                        {{$singleValidation['type']}}
                                        @endif
                                        data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                    @endforeach
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
                            name="{{$inputName}}" 
                            class="form-control" 
                            placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : __('admin.enter') . ' ' . $input['text']}}" 
                            
                            @if(isset($input['validation']) && $input['validation'] != false)
                                @foreach ($input['validation'] as $singleValidation)
                                    @if(isset($singleValidation['value']))
                                    {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                    @else
                                    {{$singleValidation['type']}}
                                    @endif
                                    data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                @endforeach
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
                                name="{{$inputName}}[{{$lang}}]" 
                                class="form-control" placeholder="{{isset($input['placeholder']) ? $input['placeholder'][$lang] : __('admin.enter') . ' ' . $input['text'][$lang]}}" 
                                
                                @if(isset($input['validation']) && $input['validation'] != false)
                                    @foreach ($input['validation'] as $singleValidation)
                                        @if(isset($singleValidation['value']))
                                        {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                        @else
                                        {{$singleValidation['type']}}
                                        @endif
                                        data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                    @endforeach
                                @elseif (!isset($input['validation']))
                                    required
                                    data-validation-required-message='{{__('admin.this_field_is_required')}}' 
                                @endif

                                {{!isset($input['attributes']['rows']) ? 'rows=6' : ''}}

                                @if(isset($input['attributes']))
                                    @foreach ($input['attributes'] as $key => $value)
                                        {{$key}}="{{$value}}"
                                    @endforeach
                                @endif
                        >
                            {{$item->getTranslations($inputName)[$lang]}}
                        </textarea>
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
                            name="{{$inputName}}" 
                            class="form-control" 
                            placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : __('admin.enter') . ' ' . $input['text']}}" 
                            
                            @if(isset($input['validation']) && $input['validation'] != false)
                                @foreach ($input['validation'] as $singleValidation)
                                    @if(isset($singleValidation['value']))
                                    {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                    @else
                                    {{$singleValidation['type']}}
                                    @endif
                                    data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                @endforeach
                            @elseif (!isset($input['validation']))
                                required
                                data-validation-required-message='{{__('admin.this_field_is_required')}}' 
                            @endif

                            {{!isset($input['attributes']['rows']) ? 'rows=6' : ''}}
                            @if(isset($input['attributes']))
                                @foreach ($input['attributes'] as $key => $value)
                                    {{$key}}="{{$value}}"
                                @endforeach
                            @endif
                    >
                        {{$item[$inputName]}}
                    </textarea>
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
                            name="{{$inputName}}" 
                            class="select2 form-control" 
                            
                            @if(isset($input['validation']) && $input['validation'] != false)
                                @foreach ($input['validation'] as $singleValidation)
                                    @if(isset($singleValidation['value']))
                                    {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                    @else
                                    {{$singleValidation['type']}}
                                    @endif
                                    data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                @endforeach
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
                            @if(isset($input['placeholder']))
                                <option  disabled value>{{$input['placeholder']}}</option>
                            @else
                                <option  disabled value>{{__('admin.enter') . ' ' . $input['text']}}</option>
                            @endif
                            @foreach ($input['options']['array'] as $option)
                                <option @if($input['optionData'] != null) data-{{$input['optionData']['name']}}={{$option[$input['optionData']['value']]}} @endif {{$option[$input['options']['value']] == $item[$inputName] ? 'selected' : ''}} value="{{$option[$input['options']['value']]}}">{{$option[$input['options']['text']]}}</option>
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
                            name="{{$inputName}}[]" 
                            class="select2 {{$inputName}}-multiple form-control" 
                            
                            @if(isset($input['validation']) && $input['validation'] != false)
                                @foreach ($input['validation'] as $singleValidation)
                                    @if(isset($singleValidation['value']))
                                    {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                    @else
                                    {{$singleValidation['type']}}
                                    @endif
                                    data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                @endforeach
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
                                <textarea name="meta_title[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.meta_title_'.$lang)}}" cols="30" rows="10">{{$item->getTranslations('meta_title')[$lang]  ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach (languages() as $lang)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('site.meta_description_'.$lang) }}</label>
                            <div class="controls">
                                <textarea name="meta_description[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.meta_description_'.$lang)}}" cols="30" rows="10">{{$item->getTranslations('meta_description')[$lang]  ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach (languages() as $lang)
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('site.meta_keywords_'.$lang) }}</label>
                            <div class="controls">
                                <textarea name="meta_keywords[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.meta_keywords_'.$lang)}}" cols="30" rows="10">{{$item->getTranslations('meta_keywords')[$lang] ?? ''}}</textarea>
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
                                <input type="text" name="{{$input['map_address'] === null}} ? 'address' : $input['map_address']['name']" id="address" class="form-control"
                                placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : __('admin.enter_addresss')}}" 
                                @if (isset($input['map_address']) && $item[$input['map_address']['name']] !== null)
                                    value="{{$item[$input['map_address']['name']]}}"
                                @endif
                                @if(isset($input['validation']) && $input['validation'] != false)
                                    @foreach ($input['validation'] as $singleValidation)
                                        @if(isset($singleValidation['value']))
                                        {{$singleValidation['type'] . '=' . $singleValidation['value']}}
                                        @else
                                        {{$singleValidation['type']}}
                                        @endif
                                        data-validation-{{$singleValidation['type']}}-message='{{$singleValidation['message']}}'
                                    @endforeach
                                @elseif (!isset($input['validation']))
                                    required
                                    data-validation-required-message='{{__('admin.this_field_is_required')}}' 
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