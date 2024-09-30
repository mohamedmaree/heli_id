{{-- <div class="sec-padd bacg_section" id="our_service">
    <div class="container">
        <div class="the_title">
            <h3>{{__('intro_site.our_services')}}</h3>
            <p>
                {{$settings['services_text']}}
            </p>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="box-servess">
                        <img  loading="lazy"  src="{{asset('intro_site/imgs/ser.png')}}">
                        <h6 class="f-b">{{$service->title}}</h6>
                        <p class="grey-color">
                            {!! $service->description !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2>{{ __('site.services') }}</h2>
            <h3>{{ __('site.check_our') }} <span> {{ __('site.services') }}</span></h3>
            <p>{!! $settings['services_text_'.lang()] !!}</p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="row">
                
                @foreach ($services as $service)
                  <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="{{ $service->icon}}"></i></div>
                    <h4 class="title"><a href="{{ route('service-details',[$service]) }}">{{ $service->title }}</a></h4>
                    <p class="description">{!! $service->short_description !!}</p>
                  </div>
                @endforeach


              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Services Section -->

          <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">
  
          <div class="text-center">
            {{-- <h3>Call To Action</h3> --}}
            {{-- <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            {{-- <a class="cta-btn" href="#">Call To Action</a> --}}
          </div>
  
        </div>
      </section><!-- End Cta Section -->