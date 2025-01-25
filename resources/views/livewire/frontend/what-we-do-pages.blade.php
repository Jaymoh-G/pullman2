<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/services_responsive.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/pages.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/carousel.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/main_styles.css') }}"
        />
    <style>
       .swiper-container{
        width: auto;

      }
     .pdficon-img{
        margin: 0 auto;
        width:270px;
        height:300px;
        min-height: 215px;

      }
      .styled-h2 {
          color: #EE1C25;
      }

      .swiper-wrapper{
        text-align: center;
        vertical-align: middle;
        line-height: 90px;
      }
      .swiper-slide>.slider>a>p {
        width: 210px;
      }

      @media only screen and (min-width: 1200px){
        .swiper-slide {
          flex-shrink: 0;
          width: 50% !important;
          height: 100% !important;
          position: relative;
          transition-property: transform;
          margin-right: 0 !important;
        }

       .partners-slider{
          width: 50%;
          height: 100%;
          margin: 0 auto;
        }
      }

      @media only screen and (max-width: 480px){
        .energy {
          padding-left: 0px !important;
          padding-right: 0px !important;
          padding-top: 2em !important;
        }
        .section-done h2 {
          padding-left: 0em !important;
          text-align: center;
        }
        .partners .media_title::before {
          left: 2em;
        }
        .partners .media_title::after {
          left: 14em;
        }
        .get-in-touch p {
          padding-left: 0em;
        }
        .get-in-touch .btn {
          margin-top: 1em;
          margin-right: 5em;
        }
        .footer_container {
          height: auto;
        }
            #topbar input[type="text"] {
        padding: 6px;
        margin-bottom: 26px;
        font-size: 17px;
        width: 80px;
        height: 30px;
    }
         #topbar .contact-links {
        display: none;
    }
    #topbar .search-container button {
        margin-right: 1px;
        margin-bottom: 0.3em;
    }
    #topbar .social-links {
    margin-right: 0.1em;
    padding-left: 3em;
}
}
    </style>

      <!-- Home -->
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
          data-image-src="{{ asset('/images/power2.jpg') }}"
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
                     <li> <a href="{{route('frontend.whatWeDo')}}">What we do</a></li>
                      <li>{{$this->whatWeDos->title}}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="energy">
        <div class="container">

          <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
              <h1 style="font-weight: 600; font-size: 30px;color: black;">{{$this->whatWeDos->title}}</h1>
                {!!$this->whatWeDos->description!!}
                <p>
                  <a href="https://wa.me/254726634673?text=Hi,%20I%20got%20your%20contacts%20from%20the%20website%20and%20I&apos;m%20interested%20in%20your%20services"
                  class="btn btn-primary pt-1">
                    Get in Touch
                  </a>
                </p>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
              <img src="{{ asset($this->whatWeDos->image) }}" style="width:475px" alt="{{$this->whatWeDos->image}}" srcset="">
            </div>
          </div>
        </div>
      </div>

        <!-- WHAT WE HAVE DONE -->
        <div class="container-full section-done">
          <div class="container">
            <h2>Statistics on our services</h2>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <p>{{$this->whatWeDos->partnerCountries}} <br> <span style="color:white">Equipment availability</span></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p>{{$this->whatWeDos->collaborations}}<br><span style="color:white">Cost savings</span><p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p>{{$this->whatWeDos->peopleReached}}<br><span style="color:white">Customer Satisfaction</span></p>
              </div>
            </div>
          </div>
        </div>
		<!-- OUR WORKS SECTION  -->
    <div class="container-full press pt-2 mb-4">
      <div class="container text-center">
          <h2 class="styled-h2 media_title">Our Works</h2>
      </div>
      <!-- Top content -->
      <div class="swiper-container partners-slider">
          <div class="swiper-wrapper">
              @if(!is_null($publications)) @forelse ($publications as $publication)
              <div class="swiper-slide slide">
                <div class="slider">
                  <img
                      class="pdficon-img"
                      src="{{ asset($publication->publication_image) }}"
                      alt="{{$publication->title}}"
                      srcset=""
                      style="object-fit: cover;"
                  />
                  <div style="line-height: 0px;">
                  <a href="{{route('frontend.publications.detail',['slug'=>$publication->slug])}}" > <h6 class="pt-3" style="color:#111112;font-weight:bold;">{{$publication->title}} </h6></a>
                  <a href="{{route('frontend.publications.detail',['slug'=>$publication->slug])}}" class="btn btn-primary pt-1">
                    Read More
                  </a>
                  </div>
                </div>
              </div>
              @empty
              <p>No publication found.</p>
              @endforelse @endif
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
      </div>
  </div>

    <!-- GET IN TOUCH SECTION -->
  <div class="get-in-touch">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-9">
					<p style="color:white">Looking to work with an efficient, cost friendly and timely construct company</p>
        </div>

        <div class="col-lg-3">
          <a href="{{route('frontend.contactUs')}}" class="btn btn-primary pt-1"> Get In Touch
            <i class="pl-1 fas fa-chevron-right text"></i>
          </a>
      </div>
      </a>
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
          slidesPerView: 2,
          spaceBetween: 10,
          breakpoints: {
              0: {
                  slidesPerView: 1,
              },
              640: {
                  slidesPerView: 1,
              },
              768: {
                  slidesPerView: 2,
              },
              1024: {
                  slidesPerView: 2,
              },
          },
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
      });
  </script>
	</div>



