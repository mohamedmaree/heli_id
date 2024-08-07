
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ route('intro') }}">{{$settings['intro_name_'.lang()]}}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('intro') }}#hero" class="logo"><img src="{{$settings['intro_logo']}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('intro') }}#hero">{{ __('site.home') }}</a></li>
          <li><a class="nav-link scrollto" href="{{ route('intro') }}#about">{{ __('site.about_us') }}</a></li>
          <li><a class="nav-link scrollto" href="{{ route('intro') }}#services">{{ __('site.services') }}</a></li>
          <li><a class="nav-link  scrollto" href="{{ route('intro') }}#portfolio">{{ __('site.portfolio') }}</a></li>
          {{-- <li><a class="nav-link scrollto" href="{{ route('intro') }}#parteners">{{ __('site.parteners') }}</a></li> --}}
          @if(count($teams))
            <li><a class="nav-link scrollto" href="{{ route('intro') }}#team">{{ __('site.team') }}</a></li>
          @endif
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto" href="#contact">{{ __('site.contact_us') }}</a></li>
          @if(lang() == 'ar')
          <li><a class="nav-link" href="{{ route('change-lang',['en']) }}">English</a></li>
          @else
          <li><a class="nav-link" href="{{ route('change-lang',['ar']) }}">العربية</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->