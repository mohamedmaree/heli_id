@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="fqs match-height">
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
                                       
                                        <div class="col-12">
                                            <div class="col-12">
                                                <ul class="nav nav-tabs mb-3">
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
                                                                <label for="first-name-column">{{__('admin.question')}} {{ $lang }}</label>
                                                                <div class="controls">
                                                                    <input type="text" value="{{$fqs->getTranslations('question')[$lang]??''}}" name="question[{{$lang}}]" class="form-control" placeholder="{{__('admin.write') . __('admin.question')}} {{ $lang }} " required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">{{__('admin.answer')}} {{ $lang }}</label>
                                                                    <textarea class="form-control" name="answer[{{$lang}}]" id="" cols="30" rows="10"  placeholder="{{__('admin.write') . __('admin.answer')}} {{ $lang }}">{{$fqs->getTranslations('answer')[$lang]??''}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                    </div>
                                                @endforeach
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
        $('.store input').attr('disabled' , true)
        $('.store textarea').attr('disabled' , true)
        $('.store select').attr('disabled' , true)

    </script>
@endsection