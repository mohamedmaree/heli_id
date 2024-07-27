    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container-fluid">
  
          <div class="section-title">
            <h2>{{ __('site.team') }}</h2>
            <h3>{{ __('site.team2') }}</h3>
            <p>{{$settings['team_text_'.lang()]}}</p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="row">
               
                @foreach($teams as $team)
                <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="member">
                    <img src="{{ $team->image }}" class="img-fluid" alt="">
                    <div class="member-info">
                      <div class="member-info-content">
                        <h4>{{ $team->name }}</h4>
                        <span>{{ $team->job }}</span>
                      </div>
                      {{-- <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div> --}}
                    </div>
                  </div>
                </div> <!-- End Member Item -->
                @endforeach
  
  
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Team Section -->