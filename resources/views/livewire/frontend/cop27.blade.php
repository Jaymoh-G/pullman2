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
            data-image-src="{{ asset('images/power2.jpg') }}"
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
        <!-- Events Section -->


        <!-- End Events Section -->
 <div class="container-full latest-events">
            <div class="container">
                <div class="top-content">
                    <h2>Explainers</h2>
                    <a href="{{ route('frontend.cop.categories',['subCategorySlug'=>'explainers']) }}"><p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($explainers as $ex)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{"/".$ex->image}}"
                            alt="{{$ex->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$ex->sub_category_name}}
                                </p>
                                <a
                                    href="{{route('frontend.cop.details',['category'=>$ex->sub_category_name,'slug'=>$ex->slug])}}"

                                >
                                    <h6 class="card-title">
                                        {{$ex->titleExcerpt()}}
                                    </h6>
                                    <p class="card-text">
                                        <!-- {{$ex->excerpt()}} -->
                                    </p>
                                </a>
                                <i class="fas fa-calendar-check"></i>
                            <span class="card-date">
                                {!! htmlspecialchars_decode($ex->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                            </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Keep visiting this page for updates </p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- News Section -->
        <div class="container-full news-sec">
            <div class="container">
                <div class="top-content">
                    <h2>Analysis</h2>
                    <a href="{{ route('frontend.cop.categories',['subCategorySlug'=>'analysis']) }}"> <p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($analysis as $an)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{'/'.$an->image}}"

                            alt="{{$an->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$an->sub_category_name}}
                                </p>
                                <a
                                    href="{{route('frontend.cop.details',['category'=>$an->sub_category_name,'slug'=>$an->slug])}}"
                                >
                                    <h5 class="card-title">
                                        {{$an->titleExcerpt()}}
                                    </h5></a
                                >
                                <div>
                                    <p class="card-text">
                                        <!-- {!!$an->body!!} -->
                                    </p>
                                </div>
                                <i class="fas fa-calendar-check"></i>
                                <a href="#">
                                    <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($an->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                                                </span
                                                >
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Keep visiting this page for updates</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End News Section -->

        <!-- Press Release section -->
        <div class="container-full press">
            <div class="container">
                <div class="top-content">
                    <h2>Media</h2>
                    <a href="{{ route('frontend.cop.categories',['subCategorySlug'=>'Media']) }}"><p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($media as $md)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{"/".$md->image}}"
                            alt="{{$md->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$md->sub_category_name}}
                                </p>
                                <a
                                    href="{{route('frontend.cop.details',['category'=>$md->sub_category_name,'slug'=>$md->slug])}}"

                                >
                                    <h6 class="card-title">
                                        {{$md->titleExcerpt()}}
                                    </h6>
                                    <p class="card-text">
                                        <!-- {{$md->excerpt()}} -->
                                    </p>
                                </a>
                                <i class="fas fa-calendar-check"></i>
                            <span class="card-date">
                                {!! htmlspecialchars_decode($md->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                            </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Keep visiting this page for updates</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Press Release section -->
    </div>
</div>
