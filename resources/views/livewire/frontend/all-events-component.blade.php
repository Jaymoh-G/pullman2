<div>
   <style>
  .img-preview {

  }
  .post-img {
      object-fit: cover;
      width: 495px;
      height: 180px;
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
          data-image-src="images/power2.jpg"
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
                      <li><a href="{{route('frontend.events.all')}}">All Events</a></li>
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


        <!-- Past Events Section-->
     <div class="past_events">
          <h2>All Events</h2>
          <div class="row mt-4">
            @forelse ($Events as $event)
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                  <div>
                    <img class="card-img-top" src="{{'/'.$event->image}}" alt={{$event->name}}>
                    <p class="power-title">{{$event->name}}</p>
                  </div>

                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4">
                          <div class="card-date pt-3"><span class="date-no">{!! htmlspecialchars_decode($event->date_from->format('d<\s\u\p>S</\s\u\p>')) !!}</span><p class="card-date pl-2">{{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M,Y')}} </p></div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                        <h5 class="card-title pt-3 pl-0" style="height: 112px">{{$event->titleAllExcerpt()}}</h5>
                        <div class="card-body pt-0 pl-0">
                          <i class="fas fa-map-marker-alt"></i>
                            <a href="#"> <span class="card-date">{{$event->location}}</span></a>
                          <div class="">
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

</div>
