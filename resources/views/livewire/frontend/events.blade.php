<div>
   <style>
  img {
    object-fit: cover;
  }
  .post-img {
      object-fit: cover;
      width: 495px;
      height: 180px;
  }
  .view-event{
    margin-top: -14px;
    margin-left: 17px;
  }
  @media only screen and (max-width: 480px){
    .past_events h2 {
        margin-top: 0em;
        margin-bottom: 0em;
    }
    .past_events .card, .past_events .card-img-top {
        width: 27em;
    }
    .past_events .card {
      width: 100% !important;

      height: auto;
    }
    .card-img-top {
      width: 100% !important;
      margin-left: 0em !important;
    }
    .energy {
      padding-left: 0px !important;
      padding-right: 0px !important;
    }

  }
</style>
    <link rel="stylesheet" type="text/css" href="styles/responsive.css"/>
<div class="news-div">
      <div class="home">
        <div
          class="home_background parallax-window"
          data-parallax="scroll"
          style="
            background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            );
          "
          data-image-src="{{ asset('images/power2.jpg') }}"
          data-speed="0.8"
        ></div>
        <div class="home_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="home_content">
                  <div class="breadcrumbs">
                    <ul>
                      <li><a href="{{route('homepage.index')}}">Home</a></li>
                      <li>Latest</li>
                      <li>Events</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- All Events -->
      <div class="events">
        <!-- Upcoming Events -->
        <div class="container cards">
          <div class="row up-events">
            @forelse ($upcomingEvents as $event)
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h2 class="title">
                  @if (\Carbon\Carbon::parse($event->date_from)->format('Y-m-d') <= \Carbon\Carbon::now('Africa/Nairobi')->format('Y-m-d') && \Carbon\Carbon::parse($event->time_from)->format('H:i:s') <= \Carbon\Carbon::now('Africa/Nairobi')->format('H:i:s'))
                    Ongoing
                  @elseif ($event->date_from >= date('Y-m-d') || $event->time_from >= date('H:i:s'))
                    Upcoming
                  @endif
                    event
                </h2>
                <div class="card">
                  <img class="card-img-top post-img" src="{{'/'.$event->image}}" alt={{$event->name}}>
                  <p class="power-title">{{$event->name}}</p>
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="card-date pt-3">
                          <span class="date-no">{!! htmlspecialchars_decode($event->date_from->format('d<\s\u\p>S</\s\u\p>')) !!}</span>

                          <p class="card-date pl-2 date-desktop">
                            {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M Y')}}
                          </p>

                          <span class="date-mobile">
                            {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M Y')}}
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                        <h5 class="card-title pt-3 pl-0">{{$event->titleExcerpt()}}</h5>
                        <div class="card-body pt-0 pl-0">
                          <i class="fas fa-map-marker-alt"></i>
                            <a href="{{$event->registrationLink}}" target="_blank" rel="noopener noreferrer"> <span class="card-date event-location"> {{$event->location}}</span></a>
                          <div class="view-event">
                            <a href={{route('frontend.event.details', ['slug'=>$event->slug])}} target="_blank" class="btn btn-primary pt-1">View event</a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            @empty

            @endforelse
          </div>
        </div>

        <!-- Past Events Section-->
     <div class="container">
          <h2>Past Events</h2>
          <div class="row ml-4 latest-row">
            @forelse ($pastEvents as $event)
              <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="card card2">
                  <div>
                    <img class="card-img-top" src="{{'/'.$event->image}}" alt={{$event->name}}>
                    <p class="power-title">{{$event->name}}</p>
                  </div>

                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4">
                          <div class="card-date pt-3">
                            <span class="date-no">{!! htmlspecialchars_decode($event->date_from->format('d<\s\u\p>S</\s\u\p>')) !!}</span>

                            <p class="card-date pl-2 date-desktop">
                              {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M Y')}}
                            </p>

                            <span class="date-mobile">
                              {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M Y')}}
                            </span>
                          </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                        <h5 class="card-title pt-3 pl-0">{{$event-> titleExcerpt()}}</h5>
                        <div class="card-body pt-0 pl-0">
                          <i class="fas fa-map-marker-alt"></i>
                            <a href="#"> <span class="card-date event-location">{{$event->location}}</span></a>
                          <div class="view-event">
                            <a href={{route('frontend.event.details', ['slug'=>$event->slug])}} target="_blank" class="btn btn-primary pt-1">View event</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            @empty
              <p>No past events</p>
            @endforelse
          </div>
    </div>
  </div>

  <!-- SUBSCRIBE SECTION -->
   <div class="subscriber">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div>
                            <h2 class="styled-h2">
                                Subscribe to our newsletter
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Service -->
                    <div class="col-lg-12 col-md-12 service_col text-center">
                        <div class="subscribe">
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
                            @endif
                            <form
                                class="form-horizontal"
                                wire:submit.prevent="mailchimpSubscribe"
                            >
                                <input
                                    class="name mr-1"
                                    wire:model="name"
                                    type="text"
                                    placeholder="Name"
                                    required
                                />
                                @error('name')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                                <input
                                    class="mail mr-1"
                                    wire:model="email"
                                    type="email"
                                    placeholder="Email address"
                                    required
                                />

                                <button type="submit" class="subscribe-btn">
                                    Subscribe
                                </button>
                            </form>
                            @error('email')
                            <span class="error text-danger">{{
                                $message
                            }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
  <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script>
  // check if mobile
  // check for window width changes events
  $(window).resize(function() {
    if ($(window).width() < 768) {
     setMobile();
    } else{
      setDesktop();
    }
  });
  if ($(window).width() < 768) {
    setMobile();
  } else{
    setDesktop();
  }
  function setMobile(){
    $('.date-no').removeClass('date-no');
    $('.date-desktop').hide();
    $('.date-mobile').show();
    $('.card-title').hide();
    $('.fa-map-marker-alt').hide();
    $('.event-location').hide();
    $('.col-sm-4').css('width', 'auto');
    $('.col-sm-8').css('width', 'auto');
  }

  function setDesktop(){
      $('.date-desktop').show();
      $('.date-mobile').hide();
      $('.card-title').show();
      $('.fa-map-marker-alt').show();
      $('.event-location').show();
      $('.col-sm-4').css('width','33.33%');
  }
</script>
</div>
