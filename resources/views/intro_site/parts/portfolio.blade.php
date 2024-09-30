    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container-fluid">

        <div class="section-title">
          <h2>{{ __('site.portfolio') }}</h2>
          <h3>{{ __('site.check_our') }} <span>{{ __('site.portfolio') }}</span></h3>
          <p>{!! $settings['portfolio_text_'.lang()] !!}</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach($categoies as $category)
                <li data-filter=".filter-{{ $category->name }}">{{ $category->name }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container justify-content-center">

          <div class="col-xl-10">
            <div class="row">
              @foreach($categoies as $category)
                @foreach($category->portfolios as $portfolio)
                  <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ $category->name }}">
                    <div class="portfolio-wrap">
                      <img src="{{$portfolio->images[0]->image??''}}" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4> {{ $category->name }} {{ $loop->iteration }}</h4>
                        <p>{{ $category->name }}</p>
                        <div class="portfolio-links">
                          <a href="{{$portfolio->images[0]->image??''}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $category->name }} {{ $loop->iteration }}"><i class="bx bx-plus"></i></a>
                          <a href="{{ route('portfolio-details',[$portfolio]) }}" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                  </div>
                </div><!-- End portfolio item -->
                @endforeach
              @endforeach



           

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->