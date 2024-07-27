{{-- <div class="owl-carousel owl-theme owl-index" id="home">
    @foreach ($sliders as $slider)
        <div class="item">
            <div class="info_owl">
                <div class="container">
                    <div class="ads_wol">
                        <h3>{{$slider->title}}</h3>
                        <p>{{$slider->description}}</p>
                    </div>
                </div>
                <div class="img_owl_index">
                    <img loading="lazy" src="{{$slider->image}}">
                </div>
            </div>
        </div>
    @endforeach
</div> --}}

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">

        @foreach ($sliders as $slider)
          <div class="carousel-item active" style="background-image: url({{$slider->image}})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animated fadeInDown">{{$slider->title}}</h2>
                <p class="animated fadeInUp">{{$slider->description}}</p>
                {{-- <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a> --}}
              </div>
            </div>
          </div>
        @endforeach



      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->