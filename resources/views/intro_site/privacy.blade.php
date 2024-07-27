
@extends('intro_site.layouts.master')

@section('content')
   <!-- Start body-content -->

<div class="body-content p-md-3">
    <div class="container p-md-5 ">
        <h1>
            {{__('intro_site.privacy')}}
        </h1>
        <div class=" p-5">
            {!! $settings['privacy_' . lang()] !!}
        </div>
    </div>
</div>

<!-- end body-content --> 
@endsection
    

  