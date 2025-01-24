<div class="publicationspage">
    <style>
        .featured-options .btn {
            padding-top: 0.3em !important;
            margin-left: 0em !important;
            margin-top: 0px !important;
        }
        .media-subtitle {
            padding-top: 10px;
        }
        .pdficon-img {
            object-fit: cover;
        }
        .pub_text {
            width: 65%;
        }
        @media only screen and (max-width: 480px) {
            .cards {
                margin-top: 0em !important;
            }
            .publicationspage .featured {
                padding: 0 !important;
            }
            .pdficon-img {
                width: 200px !important;
                height: auto !important;
                display: block;
                margin: auto;
            }
            .media-subtitle {
                height: auto !important;
            }
            .folder-sec {
                display: none !important;
            }
            .publicationspage .sidebar {
                margin-right: 0em;
                margin-top: 0px;
            }
            .pub_text {
                margin: auto !important;
                text-align: center;
            }
            .widget.widget_categories ul li {
                width: 100%;
            }
            .publication-download-button {
                margin-left: 80px !important;
            }
            .media-subtitle {
                text-align: center !important;
            }
            .featured-options .btn {
                margin-left: 0em !important;
            }
            .widget.widget_categories {
                width: 95%;
            }
            .featured h2 {
                text-align: center;
                padding: 1%;
            }
        }
    </style>
    <div id="fb-root"></div>
    <script
        async
        defer
        crossorigin="anonymous"
        src="#"
        nonce="s1SQPzMI"
    ></script>
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
                                    <li>Publications</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 </div>
    <div class="featured publications">
        <div class="container-full cards">
            <div class="row featured-options">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div id="publications" class="pub-div">
                        <h1 style="font-weight: 600; font-size: 30px;color: black;">Some of Our Work</h1>
                        <div class="row">
                            @forelse ($publications as $publication)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="publication">
                                    <div class="pub_img">
                                        <img
                                            class="pdficon-img"
                                            src="{{'/'.$publication->publication_image}}"
                                            alt=""
                                            srcset=""
                                        />
                                    </div>
                                    <div class="pub_text">
                                        <h3 class="media-subtitle">
                                            <a
                                                href="{{route('frontend.publications.detail',['slug'=>$publication->slug])}}"
                                                style="color: rgb(41, 39, 39)"
                                            >
                                                {{substr($publication->title,0,80)}}
                                                {{strlen($publication->title)>80 ? '...' : ''}}
                                            </a>
                                        </h3>
                                        <div class="folder-sec">
                                            <!-- <i
                                                class="fa fa-folder"
                                                aria-hidden="true"
                                            ></i> -->
                                            <span class="media-spanmb">
                                                <!-- {{$publication->file_size?round(($publication->file_size/1024),2).'mb' : 'mb'}} -->
                                                <span class="share-txt"
                                                    >Share</span
                                                >
                                            </span>
                                            <div class="share-sec">
                                                <div class="share-icon">
                                                    <ul
                                                        class="share-menu bottomLeft"
                                                    >
                                                        <li class="share right">
                                                            <i
                                                                class="fa fa-share-alt"
                                                            ></i>
                                                            <ul
                                                                class="share-submenu"
                                                            >
                                                                <li>
                                                                    <a
                                                                        href="https://api.whatsapp.com/send?text={{$publication->title}} {{route('frontend.publications.detail',['slug'=>$publication->slug])}}"
                                                                        target="_blank"
                                                                        class="whatsapp"
                                                                    >
                                                                        <i
                                                                            class="fab fa-whatsapp"
                                                                        ></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="https://www.facebook.com/sharer.php?u={{route('frontend.publications.detail',['slug'=>$publication->slug])}}"
                                                                        target="_blank"
                                                                        class="facebook"
                                                                    >
                                                                        <i
                                                                            class="fab fa-facebook"
                                                                        ></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="https://twitter.com/share?url={{route('frontend.publications.detail',['slug'=>$publication->slug])}}&text={{$publication->title}}"
                                                                        target="_blank"
                                                                        class="twitter"
                                                                    >
                                                                        <i
                                                                            class="fab fa-twitter"
                                                                        ></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>Work done not found</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Categories section -->
                        <div class="category">
                            <div class="vc_wp_categories wpb_content_element">
                                <aside class="widget widget_categories">
                                    <h5 class="widget_title">
                                        Our Work Categories
                                    </h5>
                                    <ul>
                                        @forelse($categories as $category)
                                        <a
                                            href="/our-work?category={{$category->name}}"
                                            ><button class="sidebar-button">
                                                {{$category->name}}
                                            </button></a
                                        >
                                        @empty
                                        <p>No Categories found</p>
                                        @endforelse
                                    </ul>
                                </aside>
                            </div>
                        </div>
                        <hr />
                        <!-- Twitter section -->
                    </div>
                </div>
            </div></div>

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
                        <div
                            class="col-lg-12 col-md-12 service_col text-center"
                        >
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

