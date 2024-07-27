@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="rows match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.show')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form  class="store form-horizontal" >
                            <div class="form-body">
                                <div class="row">
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.section')}}</label>
                                            <div class="controls">
                                                <select name="intro_fqs_category_id" class="select2 form-control" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                    <option value>{{__('admin.select_section')}}</option>
                                                    @foreach ($categories as $category)
                                                        <option {{$category->id == $fqs->intro_fqs_category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('site.question_'.$lang)}}</label>
                                            <div class="controls">
                                                <input type="text" value="{{$fqs->getTranslations('title')[$lang]}}" name="title[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.question_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach (languages() as $lang)
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{__('site.answer_'.$lang)}}</label>
                                                <textarea class="form-control" name="description[{{$lang}}]" id="" cols="30" rows="10"  placeholder="{{__('site.write') . __('site.answer_'.$lang)}}">{{$fqs->getTranslations('description')[$lang]}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
        $('.store input').attr('disabled' , true)
        $('.store textarea').attr('disabled' , true)
        $('.store select').attr('disabled' , true)

    </script>
@endsection