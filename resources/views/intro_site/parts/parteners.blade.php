{{-- 
    <div class="sec-padd">
        <div class="container">
            <div class="the_title">
                <h3>{{__('intro_site.parteners')}}</h3>
                <p class="grey-color">
                    {{$settings['parteners_text']}}
                </p>
            </div>
            
            <div class="owl-carousel owl-theme owl-brands">
                @foreach ($parteners as $partener)
                    <div class="item">
                        <img  loading="lazy"  src="{{$partener->image}}">
                    </div>
                @endforeach
            </div>                
        </div>
    </div>
     --}}

         <!-- ======= Testimonials Section ======= -->
    <section id="parteners" class="testimonials section-bg">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2>{{__('intro_site.parteners')}}</h2>
            <h3>{{ __('site.what') }} <span>{{ __('site.are_saying') }}</span> {{ __('site.about2') }}</h3>
            <p>{!! settings['parteners_text_'.lang()] !!}</p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
  
              <div class="row">

                @foreach ($parteners as $partener)
                    <div class="col-lg-6">
                      <div class="testimonial-item mt-4 mt-lg-0">
                        <img src="{{$partener->image}}" class="testimonial-img" alt="">
                        <h3>{{$partener->name}}</h3>
                        <h4>{{$partener->job}}</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          {{$partener->opinion}}
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div><!-- End testimonial-item -->
                 @endforeach
  
                
                
  
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Testimonials Section -->