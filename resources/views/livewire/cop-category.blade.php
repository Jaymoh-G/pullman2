<div class="news-div">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css" />
    <style>
        .post-img {
            object-fit: cover;
            width: 330px;
            height: 200px;
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
            data-image-src="/../images/power2.jpg"
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
                                    <li>
                                        <a href="{{route('frontend.latest')}}">Latest</a>
                                        </li>
                                    <li>{{$title}}</li>
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
        <div class="container">
            <div class="row ml-4 latest-row">
                @foreach($blogs as $blog)

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <a  href="{{route('frontend.cop.details',['category'=>$blog->sub_category_slug,'slug'=>$blog->slug])}}">
                            <img class="card-img-top post-img" src="{{"/".$blog->image}}" alt="{{$blog->title}}" />
                        </a>
                        <div class="card-body">
                            <p class="card-text-head">
                                {{$blog->category->name}}
                            </p>
                            <a href="{{route('frontend.cop.details',['category'=>$blog->subCategory->slug,'slug'=>$blog->slug])}}"
                            >

                                <h5 class="card-title">
                                    {{$blog->titleExcerpt()}}
                                </h5>
                                <div class="card-text"></div>
                            </a>
                            <div class="icons">
                                <i class="fa fa-calendar-check-o"></i>
                                <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($blog->created_at->format('d<\s\u\p>S</\s\u\p> M, Y')) !!}
                                                </span
                                                >
                                <p class="share-text">Share</p>
                                <div class="share-icon">
                                    <ul class="share-menu bottomLeft">
                                        <li class="share right">
                                            <i class="fa fa-share-alt"></i>
                                            <ul class="share-submenu">
                                                <li>
                                                    <a
                                                        href="https://api.whatsapp.com/send?text={{$blog->title}} {{route('frontend.cop.details',['category'=>$blog->subCategory->slug,'slug'=>$blog->slug])}}"
                                                        target="_blank"
                                                        class="whatsapp"
                                                    >
                                                        <i
                                                            class="
                                                                fab fa-whatsapp
                                                            "
                                                        ></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="https://www.facebook.com/sharer.php?u={{route('frontend.cop.details',['category'=>$blog->category->slug,'slug'=>$blog->slug])}}"
                                                        target="_blank"
                                                        class="facebook"
                                                    >
                                                        <i
                                                            class="
                                                                fab fa-facebook
                                                            "
                                                        ></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="https://twitter.com/share?url={{route('frontend.cop.details',['category'=>$blog->category->slug,'slug'=>$blog->slug])}}&text={{$blog->title}}"
                                                        target="_blank"
                                                        class="twitter"
                                                    >
                                                        <i
                                                            class="
                                                                fab fa-twitter
                                                            "
                                                        ></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{route('frontend.cop.details',['category'=>$blog->category->slug,'slug'=>$blog->slug])}}" class="btn btn-primary pt-1"
                                >Read More
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div style="margin: 10px">
                <p>{{$blogs->links()}}</p>
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
