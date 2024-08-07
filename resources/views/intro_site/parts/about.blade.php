{{-- <div class="sec-padd" id="who_we">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info_JM">
                    <h4 class="main-color mb-20">{{__('intro_site.info_about')}} {{$settings['intro_name']}}</h4>
                    <p class="grey-color mb-20">{{$settings['intro_about']}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img_info_JM">
                    <img  loading="lazy" src="{{$settings['about_image_1']}}">
                    <img  loading="lazy" src="{{$settings['about_image_2']}}">
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">
  
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style="background: url('{{ $settings['about_image_1'] }}') center center no-repeat;">
              <a href="{{ $settings['intro_about_video'] }}" class="glightbox play-btn mb-4"></a>
            </div>
  
            <div class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <h3>{{ $settings['intro_about_title_'.lang()] }}</h3>
              <p>{{ $settings['intro_about_'.lang()] }}</p>
  
              @if($settings['intro_about_step1_'.lang()] )
              <div class="icon-box">
                <div class="icon"><i class="bx bx-fingerprint"></i></div>
                <h4 class="title"><a href="">{{ $settings['intro_about_step1_title_'.lang()] }}</a></h4>
                <p class="description">{{ $settings['intro_about_step1_'.lang()] }}</p>
              </div>
              @endif
  
              @if($settings['intro_about_step2_'.lang()] )
              <div class="icon-box">
                <div class="icon"><i class="bx bx-gift"></i></div>
                <h4 class="title"><a href="">{{ $settings['intro_about_step2_title_'.lang()] }}</a></h4>
                <p class="description">{{ $settings['intro_about_step2_'.lang()] }}</p>
              </div>
              @endif
  
              @if($settings['intro_about_step3_'.lang()] )
              <div class="icon-box">
                <div class="icon"><i class="bx bx-atom"></i></div>
                <h4 class="title"><a href="">{{ $settings['intro_about_step3_title_'.lang()] }}</a></h4>
                <p class="description">{{ $settings['intro_about_step3_'.lang()] }}</p>
              </div>
              @endif
  
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->