<div>
    <link rel="stylesheet" type="text/css" href="styles/pages.css" />
    <style>
        @media only screen and (max-width: 600px) {
            .no-open-positions{
                width: 80% !important;
            }
        }
        @media only screen and (max-width: 480px) {
        .about-careers img {
                width: 95%;
                height: auto;
                object-fit: cover;
                margin-top: 2em;
                margin-bottom: 20px;

             }
             .no-open-positions{
                width: 80% !important;
                height: auto;
                object-fit: cover;
                margin-top: 2em;
                margin-bottom: 20px;
                    margin-left: auto;
    margin-right: auto;
    padding: 0;
    text-align: center;

             }
             .no-pos .social{
                 padding: 0;
                 text-align: center;
                  margin-left: 45px;
             }
             .open-pos h2 {
                text-align: center;
                padding-left: 0em !important;
                padding-right: 0em !important;

             }
             .no-pos p{
                text-align: center;
                padding-left: 0em !important;
                padding-right: 0em !important;
                margin-left: 0em auto;
                margin-right: 0em auto;
             }
        }
    </style>
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
                                    <li>
                                        <a href="{{ route('homepage.index') }}"
                                            >Home</a
                                        >
                                    </li>
                                    <li>Join Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background:#faf6f6;">
        @if (!is_null($this->sectionOneData))
            <div class="about-careers">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{'/'.$this->sectionOneData->image}}" alt="{{$this->sectionOneData->name}}" srcset="" />
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-text">
                            <h2>{{$this->sectionOneData->name}}</h2>
                            {!!$this->sectionOneData->text!!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- OPEN POSITIONS SECTION -->
        <div class="open-pos">
            <div class="container">
                <h2>Open Positions</h2>
                <div class="row">
                    @forelse ($jobs as $job)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <h5 class="card-title">{{$job->title}}</h5>
                                    <span class="card-link">
                                        {{$job->job_type}}
                                    </span>
                                </div>
                                <p class="card-text">{{$job->location}}</p>
                                <div class="daystogo">
                                    <a
                                        href="{{ route('frontend.careers.details', $job->slug) }}"
                                        class="card-link"
                                        >View</a
                                    >
                                    <p class="days-text">
                                        <span
                                            class="no-of-days"
                                            >{{Carbon\Carbon::parse($job->deadline)->diffInDays(now())}}</span
                                        >
                                        days to go
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="container no-pos no-open-positions">
                        @if (!is_null($this->sectionTwoData))
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            {!!$this->sectionTwoData->text!!}
                                            <div class="social">
                                                <a href="#" target="_blank" rel="noopener noreferrer"class="facebook"><i class="fab fa-facebook"></i></a>
                                                <a href="#"target="_blank" rel="noopener noreferrer" class="twitter"><i class="fab fa-twitter"></i></a>
                                                <a href="#" target="_blank" rel="noopener noreferrer"class="instagram"><i class="fab fa-instagram"></i></a>
                                                <a href="#" target="_blank" rel="noopener noreferrer"class="instagram"><i class="fab fa-youtube-square"></i></a>
                                                <a href="#"target="_blank" rel="noopener noreferrer" class="linkedin mr-5"><i class="fab fa-linkedin"></i></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <img class="no-open-positions" src="{{'/'.$this->sectionTwoData->image}}" alt="{{$this->sectionTwoData->name}}" srcset="" style="width: 200px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @endforelse
                </div>
            </div>
        </div>



    </div>




    <!-- SUBSCRIBE SECTION -->
    <div class="subscriber">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div>
                        <h2 class="styled-h2">Subscribe to our newsletter</h2>
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
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
