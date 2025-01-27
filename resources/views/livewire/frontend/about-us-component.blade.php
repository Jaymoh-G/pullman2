
<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <style>
        .partners-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .review {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        max-width: 600px;
        width: 100%;
        text-align: left;
    }
        .styled-h2 {
            color: #ee1c25;
        }

        .swiper-slide {
            flex-shrink: 0;
            width: 25%;
            height: 100%;
            position: relative;
            transition-property: transform;
        }

        @media only screen and (min-width: 1300px) {
            .about-image img {
                width: 450px;
                height: 250px;
                margin-top: 13px;
            }

            .about.goals {
                padding-top: 0px;
            }

            .about_text p {
                padding-right: 0;
            }
            .about_text > ul {
                columns: 2;
                -webkit-columns: 2;
                -moz-columns: 2;
            }
        }

        @media only screen and (max-width: 768px) {
            .about_text > p {
                /* width: 333px; */
            }
            .join_us > .container > div > p {
                margin-left: -30px;
            }
        }

        @media only screen and (max-width: 480px) {
            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 15px;
            }
            .subscribe .subscribe-btn {
                margin-right: 50px;
            }
        }
        .swiper-button-prev,
        .swiper-button-next {
            color: #3f3d3d;
        }
        @media only screen and (max-width: 480px) {
            .subscribe .subscribe-btn {
                margin-right: 0px;
            }
        }
    </style>

    <div class="super_container">
        <div class="home">
            <div
                class="about-us home_background parallax-window"
                style="
                    background-image: linear-gradient(
                        rgba(0, 0, 0, 0.5),
                        rgba(0, 0, 0, 0.5)
                    );
                "
                data-parallax="scroll"
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
                                            <a
                                                href="{{
                                                    route('homepage.index')
                                                }}"
                                                >Home</a
                                            >
                                        </li>

                                        <li>Who we are</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about aboutpage">
            <div class="container mb-3">
                @if(!is_null($whoWeAre))

                <div class="row">
                    <!-- About Content -->
                    <div class="col-lg-7 col-md-12">
                        <div class="about-title">
                            <h1 style="font-weight: 600; font-size: 30px;color: black;">{{$whoWeAre->name}}...</h1>
                        </div>
                        <div class="about_text">{!!$whoWeAre->text!!}</div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="about-image">
                            <img
                                src="{{'/'.$whoWeAre->image}}"
                                alt="{{$whoWeAre->name}}"
                            />
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="about-text">
            <div class="container-full">
                <div class="row">
                    <div class="col-lg-12">
                        @if(!is_null($foundingDirector))
                        <div class="text-center font-weight-bolder">
                            {!!$foundingDirector->text!!}
                        </div>
                        @endif
                    </div>
                    <!-- About Content -->
                </div>
            </div>
        </div>
        <div class="about mission">
            <div class="container">
                <div class="row">
                    <!-- About Content -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @if(!is_null($ourMission))
                        <div class="about_text">
                            <img
                                src="{{'/'.$ourMission->icon}}"
                                alt="{{$ourMission->name}}"
                                srcset=""
                            />
                            <h2>{{$ourMission->name}}</h2>
                            {!!$ourMission->text!!}
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @if(!is_null($ourVision))
                        <div class="about_text">
                            <img
                                src="{{'/'.$ourVision->icon}}"
                                alt="{{$ourVision->name}}"
                                srcset=""
                            />
                            <h2>{{$ourVision->name}}</h2>
                            {!!$ourVision->text!!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- GOALS -->
        <div class="about goals">
            <div class="container-full">
                <div class="container">
                    <div class="row ml-4">
                        <div class="about_text">
                            @if (!is_null($ourGoals))
                            <img
                                src="{{'/'.$ourGoals->icon}}"
                                alt="{{$ourGoals->name}}"
                                srcset=""
                            />
                            <h2>{{$ourGoals->name}}</h2>
                            {!!$ourGoals->text!!} @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="about mission">
            <div class="container">
            <div class="row text-center">
                    <div class="col">
                        <div>
                            <h2 class="styled-h2">
                                What our clients say
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- About Content -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <img src="{{ asset('/sectionData/Mbuti.jpg') }}" alt="" srcset="" style="box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    width: 90px;
    height: 90px;
">
                        <div class="about_text">
                        "Excellent service! The team went above and beyond to meet our requirements."

                        </div>
                           </br>
                        <h3 style="color: black">Engineer Mbuti</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="{{ asset('/storage/sectionData/Jalango.jpg') }}" alt="" srcset="" style="box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    width: 90px;
    height: 90px;
">
                        <div class="about_text">
                        "Highly recommended! Great communication and delivered the project on time."
                        </div>
                        </br>
                        <h3 style="color: black">Felix Odiwour (Jalango) MP Langata</h3>
                    </div>
                </div>
            </div>
    </div>

                    <!-- REQUEST SERVICE SECTION -->
        <div class="subscriber">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div>
                            <h2 class="styled-h2">
                                Request a Service
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
                                action="#"
                                id="contact_form"
                                class="contact_form"
                                wire:submit.prevent="send"
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
                                    class="name mr-1"
                                    wire:model="phone"
                                    type="text"
                                    placeholder="Phone"

                                />
                                @error('name')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror

                                <input
                                    class="mail mr-1"
                                    wire:model="message"
                                    type="text"
                                    placeholder="Describe Service"

                                />

                                <button type="submit" class="subscribe-btn">
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        var swiper = new Swiper(".partners-slider", {
            centeredSlides: false,
            autoplay: {
                delay: 2000,
            },
            loop: true,
            slidesPerView: 6,
            spaceBetween: 0,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 6,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</div>
