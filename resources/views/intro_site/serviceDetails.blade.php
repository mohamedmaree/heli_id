
@extends('intro_site.layouts.master')

@section('content')
   <!-- Start body-content -->

   <main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <ol>
          <li><a href="{{ route('intro') }}">{{ __('site.home') }}</a></li>
          <li>{{ $service->title }}</li>
        </ol>
        <h2>{{ $service->title }}</h2>
      </div>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="row">
          <p>
            {{ $service->description }}
          </p>
        </div>
      </div>
    </div>
</section>

</main><!-- End #main -->

<!-- end body-content --> 
@endsection
    

  