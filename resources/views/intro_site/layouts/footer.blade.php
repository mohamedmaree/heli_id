<footer id="footer">

    {{-- <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>To Receive Latest News</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="footer-top">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>{{ __('site.useful_links') }}</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('intro') }}#">{{ __('site.home') }}</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('intro') }}#about">{{ __('site.about_us') }}</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('intro') }}#services">{{ __('site.services') }}</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('intro') }}#portfolio">{{ __('site.portfolio') }}</a></li>
                  {{-- <li><i class="bx bx-chevron-right"></i> <a href="{{ route('intro') }}#parteners">{{ __('site.parteners') }}</a></li> --}}
                  @if(count($teams))
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('intro') }}#team">{{ __('site.team') }}</a></li>
                  @endif
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>{{ __('site.services') }}</h4>
                <ul>
                  @foreach ($services as $service)
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('service-details',[$service]) }}">{{$service->title}}</a></li>
                  @endforeach

                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-contact">
                <h4>{{ __('site.contact_us') }}</h4>
                <p>
                  {{$settings['intro_address']}} <br><br>
                  <strong>{{ __('site.phone') }}:</strong> {{$settings['intro_phone']}} <br>
                  <strong>{{ __('site.email') }}:</strong> {{$settings['intro_email']}} <br>
                </p>

              </div>

              <div class="col-lg-3 col-md-6 footer-info">
                <h3>{{ __('site.about') }} {{$settings['intro_name_'.lang()]}} </h3>
                <p>{{ Str::limit($settings['intro_about_'.lang()],400)}} </p>
                <div class="social-links mt-3">
                  @foreach($socials as $social)
                    <a href="{{ $social->url }}" target="blank" class="{{ $social->key }}"><i class="{{ $social->icon }}"></i></a>
                  @endforeach

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$settings['intro_name_'.lang()]}} </span></strong>. {{ __('site.rights') }}
      </div>
      <div class="credits">
      {{ __('site.designed') }} <a href="mailto:m7mdmaree26@gmail.com">{{ __('site.maree') }}</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('intro_site/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('intro_site/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('intro_site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('intro_site/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('intro_site/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('intro_site/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('intro_site/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('intro_site/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('intro_site/js/main.js')}}"></script>
  <script> 
    $(document).on('submit','.send-message',function (e) {
        e.preventDefault()
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            method: 'post',
            data: new FormData($(this)[0]),
            dataType:'json',
            processData: false,
            contentType: false,
            success: function(response){
                $('.error_meassages').remove();
                    toastr.success(response.message)
                    $('.send-message')[0].reset()
            },
            error: function (xhr) {
                $('.error_meassages').remove();
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('.send-message input[name=' + key + ']').after('<small class="form-text error_meassages text-danger">' + value + '</small>');
                    $('.send-message textarea[name=' + key + ']').after('<small class="form-text error_meassages text-danger">' + value + '</small>');
                });
            },
        });
    })
  </script>
</body>

</html>