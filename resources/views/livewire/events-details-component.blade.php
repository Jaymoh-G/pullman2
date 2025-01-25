<div class="super-eventdetail">
  <style>
    .post-img {
        object-fit: cover;
        width: 330px;
        height: 218px;
    }
    @media only screen and (max-width: 480px) {
        .post-img {
            width: 98%;
            height: auto;
            object-fit: cover;

        }
         .top-img {
            width: 98%;
            height: auto;
            object-fit: cover;

        }
        .event-detail .btn-search {
    width: 98%;
    height: auto;
}
.sidebar .contact-div {
    width: 98%;
    height: auto;
    margin-bottom: 2em;
}
event-detail .twitter-section {
    margin: 0 auto;
}
.styled-h2 {
    font-size: 25px;
    text-align: center;
    margin: 0 auto;
}
.other-events h2 {
    padding-bottom: 0em;
}
    }

    }
  </style>
  <div class="home">
      <div class="home_background" data-parallax="scroll"
      data-speed="0.8"></div>
      <div class="home_container">
        <div class="container">
            <div class="row">
              <div class="col">
                  <div class="home_content">
                    <div class="breadcrumbs">
                        <ul>
                          <li><a href="{{route('homepage.index')}}">Home</a></li>
                          <li><a href="{{route('frontend.events')}}">Events</a></li>
                          <li>{{$event->title}}</li>
                        </ul>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
  </div>

  <div class="event-detail">
      <div class="container">
          <div class="row">
              <div class="col-lg-9 col-md-8">
                  <img class="top-img" src="{{'/'.$event->image}}" alt="{{$event->title}}" srcset="" style="object-fit: contain; width:100%;" alt="" srcset="">
                  <div>
                      <h3>{{$event->title}}</h3>
                      <div class="container parent-div">
                          <div class="row">
                              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                                  <div class="row inner-div">
                                      <div class="col-2">
                                          <p class="left">Start</p>
                                          <p class="left">End </p>
                                          <p class="left">Location</p>
                                          <p class="left">Topic</p>
                                          <p class="left">Register</p>
                                      </div>
                                      <div class="col-2 child-div">
                                          <p><i class="far fa-calendar"></i></p>
                                           <p><i class="far fa-calendar"></i></p>
                                          <p><i class="fas fa-map-marker-alt"></i></p>
                                          <p><i class="far fa-clone"></i></p>
                                          <p><i class="far fa-clone"></i></p>
                                          <p><i class="far fa-user-plus"></i></p>
                                                                                </div>
                                      <div class="col-8">
                                          <p>{!! htmlspecialchars_decode($event->date_from->format('d<\s\u\p>S</\s\u\p>')) !!} {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M Y')}}, {{$event->time_from}}hrs, {{$event->timeZone}} </p>
                                           <p>{!! htmlspecialchars_decode($event->date_to->format('d<\s\u\p>S</\s\u\p>')) !!} {{ \Carbon\Carbon::parse($event->date_to)->translatedFormat('M Y')}}, {{$event->time_to}}hrs, {{$event->timeZone}}</p>
                                          <p>{{$event->location}}</p>
                                          <p>{{$event->name}}</p>
                                       <p> <a href="{{$event->registrationLink}}" target="_blank" rel="noopener noreferrer"> Register</a> </p>
                                      </div>
                                  </div>
                              <div class="col-lg-6"></div>
                          </div>

                      </div>

                  </div>

                  </div>
                  <div class="comment pt-1">
                        <h3>Register for this event</h3>
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
                            @endif
                        <form class="comment-form" wire:submit.prevent="register">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group comment-form-author">
                                        <input placeholder="Name *" class="form-control" wire:model="name" type="text" size="30" aria-required="true" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group comment-form-email">
                                        <input placeholder="E-mail *" class="form-control" wire:model="email" type="email" value="" size="30" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="input-group comment-form-phone">
                                        <input placeholder="Phone No.. *" class="form-control" wire:model="phone" type="telephone" size="30" aria-required="true" required>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group comment-form-comment">
                                <textarea placeholder="Message *" class="form-control" wire:model="message" rows="9" aria-required="true" spellcheck="false"></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 2;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 2;" class="cGcvT"></grammarly-extension>
                            </div>
                            <div class="btn-part">
                                <input type="submit" class="btn btn-reg" value="Register" />
                                <div class="post-social-wrapper">
                                    <span><i class="fa fa-share-alt"></i>Share:</span>
                                    <div class="post-social">
                                        <a
                                            title="Share this"
                                            href="https://www.facebook.com/sharer.php?u={{route('frontend.event.details',['slug'=>$event->slug])}}"
                                            target="_blank"
                                            class="facebook-share"
                                            >
                                                <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a
                                            title="Tweet this"
                                            href="https://twitter.com/share?url={{route('frontend.event.details',['slug'=>$event->slug])}}&text={{$event->title}}"
                                            target="_blank"
                                            class="twitter-share"
                                            >
                                                <i class="fab fa-twitter"></i>
                                        </a>
                                        <a
                                            title="Share with whatsapp"
                                            href="https://api.whatsapp.com/send?text={{$event->title}} {{route('frontend.event.details',['slug'=>$event->slug])}}"
                                            target="_blank"
                                            class="whatsapp-share"
                                            >
                                                <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>

                    </div>

                  <p class="reg-text">
                    {{$event->description}}
                  </p>

              </div>
              <div class="col-lg-3 col-md-4 col-sm-12 sidebar">

                  <button class="btn btn-search">Search</button>

                  <div >
                      <div class="contact-div">
                          <h4>How can we help you?</h4>
                          <p>Please let us know if you have a question, want to leave a comment, or would like further information about Power Shift Africa.</p>
                          <a href="{{route('frontend.contactUs')}}" target="_blank" rel="noopener noreferrer"><button class="btn btn-contact">Contact Us</button></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>


  <div class="container">
    <div class="other-events">
      <h2 class="styled-h2">Other events you may be interested in</h2>
      <div class="row mt-4">
        @forelse ($otherEvents as $event)
          <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
              <img class="post-image post-img" src="{{'/'.$event->image}}" alt="{{$event->title}}" srcset=""  alt="" srcset="">
              <p class="power-title">{{$event->name}}</p>
              <div class="container">
                <div class="row">
                     <div class="card-date pt-1"><span class="date-no">{!! htmlspecialchars_decode($event->date_from->format('d<\s\u\p>S</\s\u\p>')) !!}</span><p class="card-date pl-2">{{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M,Y')}} </p></div>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                    <h5 class="card-title pt-1 pl-0">{{$event->title}}</h5>
                    <div class="card-body pt-0 pl-0">
                      <i class="fas fa-map-marker"></i>
                        <a href="#"> <span class="card-loc"> {{$event->location}}</span></a>
                      <div class="">
                        <a href={{route('frontend.event.details', ['slug'=>$event->slug])}} class="btn btn-event pt-1">View event</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
            <p>No related events found.</p>
        @endforelse
      </div>
    </div>
  </div>

  <!-- SUBSCRIBE SECTION -->    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}"/>

  <div class="subscriber">
		<div class="container text-center">
			<div class="row">
				<div class="col">
					<div ><h2 class="styled-h2">Subscribe to stay up to date with our events</h2></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service_col text-center">
            <div class="subscribe">
              <input class="name mr-1" type="text" placeholder="Name" name="name" required>
              <input class="mail mr-1" type="text" placeholder="Email address" name="mail" required>
              <button class="subscribe-btn">Subscribe</button>
					  </div>
        </div>
			</div>
		</div>
	</div>
</div>
