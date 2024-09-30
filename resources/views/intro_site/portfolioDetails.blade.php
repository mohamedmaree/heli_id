
@extends('intro_site.layouts.master')

@section('content')
   <!-- Start body-content -->

   <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('intro') }}">{{ __('site.home') }}</a></li>
          <li>{{ __('site.porto_details') }}</li>
        </ol>
        <h2>{{ __('site.porto_details') }} </h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                @foreach($portfolio->images as $image)
                  <div class="swiper-slide">
                    <img src="{{ $image->image }}" alt="">
                  </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>{{ __('site.project_info') }}</h3>
              <ul>
                <li><strong>{{ __('site.category') }}</strong>: {{ $portfolio->category->name??'' }}</li>
                <li><strong>{{ __('site.client') }}</strong>: {{ $portfolio->client }}</li>
                <li><strong>{{ __('site.project_date') }}</strong>: {{ $portfolio->date }}</li>
                <li><strong>{{ __('site.project_url') }}</strong>: <a href="{{ $portfolio->url }}" target="blank">{{ $portfolio->url }} </a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>{{ __('site.porto_details') }}</h2>
              <p>
                {!! $portfolio->description !!}
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<!-- end body-content --> 
@endsection
    

  