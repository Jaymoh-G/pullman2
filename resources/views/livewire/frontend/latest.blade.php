<div class="latest-div">
    <!-- <link rel="stylesheet" type="text/css" href="styles/latest.css" />     -->
    <link rel="stylesheet" type="text/css" href="styles/responsive.css" />
    <style>
        .img-preview {
        }
        .post-img {
            object-fit: cover;
            width: 495px;
            height: 180px;
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
                            <!-- <div class="home_title"><span>Power Shift</span> Latest </div> -->
                            <div class="breadcrumbs">
                                <ul>
                                     <li><a href="{{route('homepage.index')}}">Home</a></li>

                                    <li>Latest</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News -->
    <div class="news">
    <!--  Excavation and Dumping section -->
        <div class="container-full press">
            <div class="container">
                <div class="top-content">
                    <h2> News</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'news']) }}"><p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($News as $pr)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{"/".$pr->image}}"
                            alt="{{$pr->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$pr->category->name}}
                                </p>
                                <a
                                    href="{{route('frontend.blog.details',['category'=>strtolower($pr->category->slug),'slug'=>$pr->slug])}}"

                                >
                                    <h6 class="card-title">
                                        {{$pr->titleExcerpt()}}
                                    </h6>
                                    <p class="card-text">
                                        <!-- {{$pr->excerpt()}} -->
                                    </p>
                                </a>
                                <i class="fas fa-calendar-check"></i>
                            <span class="card-date">
                                {!! htmlspecialchars_decode($pr->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                            </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End  Excavation and Dumping section -->

        <!--Water and Sewer Works -->
        <div class="container-full news-sec">
            <div class="container">
                <div class="top-content">
                    <h2>Civil Works</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'civil-works']) }}"> <p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($WaterSewer as $new)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{'/'.$new->image}}"

                            alt="{{$new->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$new->category->name}}
                                </p>
                              <a
                                    href="{{route('frontend.blog.details',['category'=>$new->category->slug,'slug'=>$new->slug])}}"
                                >
                                    <h5 class="card-title">
                                        {{$new->titleExcerpt()}}
                                    </h5></a
                                >
                                <div>
                                    <p class="card-text">
                                        <!-- {!!$new->body!!} -->
                                    </p>
                                </div>
                                <i class="fas fa-calendar-check"></i>
                                <a href="#">
                                    <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($new->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                                                </span
                                                >
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Water and Sewer Works -->

        <!--  Excavation and Dumping section -->
        <div class="container-full press">
            <div class="container">
                <div class="top-content">
                    <h2> Excavation and Demolition</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'excavation-and-demolition']) }}"><p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($Excavation as $pr)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{"/".$pr->image}}"
                            alt="{{$pr->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$pr->category->name}}
                                </p>
                                <a
                                    href="{{route('frontend.blog.details',['category'=>$pr->category->slug,'slug'=>$pr->slug])}}"

                                >
                                    <h6 class="card-title">
                                        {{$pr->titleExcerpt()}}
                                    </h6>
                                    <p class="card-text">
                                        <!-- {{$pr->excerpt()}} -->
                                    </p>
                                </a>
                                <i class="fas fa-calendar-check"></i>
                            <span class="card-date">
                                {!! htmlspecialchars_decode($pr->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                            </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End  Excavation and Dumping section -->
          <!--equipment-and-machine-hire Works -->
        <div class="container-full news-sec">
            <div class="container">
                <div class="top-content">
                    <h2>Equipment and Machine Hire</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'equipment-and-machine-hire']) }}"> <p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($Equipment as $new)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{'/'.$new->image}}"

                            alt="{{$new->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$new->category->name}}
                                </p>
                                <a
                                    href="{{route('frontend.blog.details',['category'=>$new->category->slug,'slug'=>$new->slug])}}"
                                >
                                    <h5 class="card-title">
                                        {{$new->titleExcerpt()}}
                                    </h5></a
                                >
                                <div>
                                    <p class="card-text">
                                        <!-- {!!$new->body!!} -->
                                    </p>
                                </div>
                                <i class="fas fa-calendar-check"></i>
                                <a href="#">
                                    <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($new->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                                                </span
                                                >
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End equipment-and-machine-hire -->

           <!--Building and Material Supply -->
        <div class="container-full press">
            <div class="container">
                <div class="top-content">
                    <h2>Building and Material Supply</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'building-materials-supply']) }}"> <p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($Materials as $new)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{'/'.$new->image}}"

                            alt="{{$new->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$new->category->name}}
                                </p>
                              <a
                                    href="{{route('frontend.blog.details',['category'=>$new->category->slug,'slug'=>$new->slug])}}"
                                >
                                    <h5 class="card-title">
                                        {{$new->titleExcerpt()}}
                                    </h5></a
                                >
                                <div>
                                    <p class="card-text">
                                        <!-- {!!$new->body!!} -->
                                    </p>
                                </div>
                                <i class="fas fa-calendar-check"></i>
                                <a href="#">
                                    <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($new->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                                                </span
                                                >
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Building and Material Supply -->


    </div>
</div>
