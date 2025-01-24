<div class="blog-section publicationspage">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
        .publicationspage .quote-card {
            max-width: 42em !important;
        }
        .swiper-slide .slide {
            width: 600px !important;
        }
        .container-full {
            margin-top: 1em;
            margin-right: 6em;
        }
        .pdficon-img {
            object-fit: contain;
        }
        footer{
            margin-top: 120px;
        }
        @media only screen and (max-width: 480px){
           .fakeimg img {
    width: 80%;
    height: auto;
    text-align: center;
}
.blogs p {
    text-align: center;
}
 .widget.widget_categories {
    width: 95%;
        }

        }
    </style>
    <div class="home">
        <div
            class="home_background"
            data-parallax="scroll"
            style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
                );
            "
            data-image-src="/images/power2.jpg"
            data-speed="0.8"
        ></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <!-- <div class="home_title"><span>Power Shift</span> Latest </div> -->
                            <div class="breadcrumbs">
                                <ul>
                                    <li>
                                        <a href="{{ route('homepage.index') }}"
                                            >Home</a
                                        >
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.publications') }}"
                                            >Our Work</a
                                        >
                                    <li>{{ $title }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="detail" wire:ignore>
                        <h1 style="font-weight: 600; font-size: 30px;color: black;">
                            {{$publication->title}}
                        </h1>
                        <div class="blog-details">
                            <p class="blog-date">
                                <i class="far fa-clock"></i
                                >{{$publication->created_at->format('d')}}
                                {{$publication->created_at->format('F, Y')}}
                            </p>
                        </div>

                        <div class="fakeimg">
                            <img
                                class="pdficon-img"
                                src="{{'/'.$publication->publication_image}}"
                                alt=""
                                srcset=""
                            />
                        </div>
                        <p class="cat-name">
                            <i>
                                @if($publication->category_ids)
                                @foreach(unserialize($publication->category_ids)
                                as $categoryId)
                                {{$this->getCategoryName($categoryId)}}
                                @if(!$loop->last) , @endif @endforeach @endif
                            </i>
                        </p>

                        <div>{!!$publication->description!!}</div>
                        <!-- <a
                            href="{{'/'.$publication->file_path}}"
                            class="btn btn-primary pt-1"
                        >
                            <i
                                class="fa fa-cloud-download"
                                aria-hidden="true"
                            ></i>
                            Download
                        </a> -->
                        <a
                            href="{{ route('frontend.contactUs') }}"
                            class="btn btn-primary pt-1"
                        >
                            <i
                                class="fa fa-cloud-download"
                                aria-hidden="true"
                            ></i>
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar">
                        <!-- Archives -->
                        <div
                            class="sidebar_archives sidebar_section"
                            style="margin-top: -5px"
                        >
                            <!-- Categories section -->
                            <div class="category">
                                <div
                                    class="vc_wp_categories wpb_content_element"
                                >
                                    <aside class="widget widget_categories">
                                        <h5 class="widget_title">Categories</h5>
                                        <ul>
                                            @forelse($categories as $category)
                                                <a
                                                    href="/our-work?category={{$category->name}}"
                                                    >
                                                    <button class="sidebar-button">
                                                    {{$category->name}}</button></a
                                                >
                                            @empty
                                            <p></p>
                                            @endforelse
                                        </ul>
                                    </aside>
                                </div>
                            </div>
                            <hr style="width: 100%;"/>

                             <!-- Twitter section -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PARTNERS SECTION  -->
    <div class="container-full pt-2 mb-4">
        <!-- Top content -->

        <div class="swiper-container quote-card-slider">
            <!-- if quotecard greater than 0 -->

         @if($quoteCards && (count($quoteCards) > 0))
                <div class="container text-center">
                <h2 class="styled-h2 media_title mb-5">Quote cards</h2>
            </div>
         @endif
            <div class="swiper-wrapper">
                @forelse($quoteCards as $quoteCard)
                <div class="swiper-slide slide">

                        <div class="row">
                            <div id="podcasts" class="pod-div">
                                <div class="qoute-card col-lg-12 col-md-12 col-sm-6 col-xs-12 mb-3">

                                    <div class="card" style="display: flex; flex-direction: row;" >
                                        <img
                                            src="{{'/'.$quoteCard->image}}"
                                            alt="{{$quoteCard->name}}"
                                            style="object-fit: cover;"
                                            width="20%";
                                            height="100%"
                                        />
                                        <div class="card-body" style="width: 80%;">

                                            <i
                                                class="
                                                    fa fa-quote-left
                                                "
                                            ></i>

                                            <p class="card-text">
                                             {!!$quoteCard->message!!}
                                            </p>

                                            <h5 class="card-title">
                                                {{$quoteCard->name}}
                                            </h5>
                                            <h5 class="card-title">
                                                {{$quoteCard->position}}
                                            </h5>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>
                </div>
                @empty
                <p></p>
                @endforelse
            </div>

                 <!-- Podcasts section -->

        </div>
    </div>
    <script>
        var swiper = new Swiper(".quote-card-slider", {
            centeredSlides: false,
            autoplay: {
                delay: 4000,
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
