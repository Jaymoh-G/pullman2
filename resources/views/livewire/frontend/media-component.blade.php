<div class="mediapage">
<style>
    .col-style{
        max-width: 30.5%;
    }

    @media only screen and (min-width: 1300px){
            #video-list>.card-div {
                height: 185px;
            }

            .videos-div iframe {
                padding-right: 0;
            }
            .photos-div img {
                object-fit: cover;
                width: 480px;
                height: 225px;
                margin-top: 0em;
            }
            .card-div>a>img.card-img-top {
                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
            }
            .photos-div .card-div{
                  width: 480px;
                height: 225px;
            }

        }
        @media only screen and (max-width: 1280px) {
             .photos-div img {
                object-fit: cover;
                width: 100%;
                height: 225px;
                margin-top: 0em;
            }
            .card-div>a>img.card-img-top {
                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
            }
            .photos-div .card-div{
                  width: 480px;
                height: 225px;
            }
            .photos-div .card-div {
                width: 100%;
            }
        }

        @media only screen and (max-width: 1280px) {
            .featured-options > div {
                margin-bottom: 5px;
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
                                    <li><a href="{{route('homepage.index')}}">Home</a></li>
                                    <li>Media</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured">
            <div class="row featured-options">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 ">
                    <a
                        href="#"
                        id="videos-btn"> <button   style=" border: 1px solid #111112;
    margin: 6px auto;
    padding: 7px;
    font-weight: 500; min-width: 100%">Videos </button></a
                    >
                    <a
                        href="#"
                        id="photos-btn">

                       <button   style=" border: 1px solid #111112;
    margin: 6px auto;
    padding: 7px;
    font-weight: 500; min-width: 100%">Photo Gallery </button></a
                    >

                    <a
                        href="#"
                        id="podcasts-btn">
                        <button   style=" border: 1px solid #111112;
    margin: 6px auto;
    padding: 7px;
    font-weight: 500; min-width: 100%">Podcasts</button></a>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
                    <div id="photos" class="photos-div">
                        <div class="row">
                            @forelse ($albums as $album)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
                                    <div
                                        class="card-div">

                                        <a href={{route('frontend.gallery',['albumId'=>$album->id])}} class="img-folder">
                                            <img
                                                src="{{'/'.$album->cover_image}}"
                                                class="card-img-top"
                                                alt="..."
                                            />
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{$album->title}}
                                                </h5>
                                                <p class="card-text">
                                                    Created on: {!! htmlspecialchars_decode($album->created_at->format('d<\s\u\p>S</\s\u\p> M')) !!}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p>Photos not found.</p>
                            @endforelse
                        </div>
                    </div>
                    <!-- Videos section -->
                    <div id="videos" class="videos-div">
                        <div class="row">
                            @forelse ($videos as $video)
                                <div id="video-list" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
                                    <div class="card-div">
                                        <iframe allowfullscreen src={{$video->video_link}}></iframe>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-6 mb-5">
                                    <p>Video not found.</p>
                                </div>
                            @endforelse

                        </div>
                    </div>

                    <!-- Podcasts section -->
                    <div id="podcasts" class="pod-div hidden">
                        <div class="row">
                            @forelse ($podcasts as $podcast)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{$podcast->title}}
                                            </h5>
                                            <i
                                                class="
                                                    fas
                                                    fa-clock
                                                "
                                            ></i>
                                            <a href="#">
                                                <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($podcast->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                                                </span
                                                ></a
                                            >
                                            <p class="card-text">
                                                {{$podcast->description}}
                                            </p>
                                            <div
                                                id="audio-player-container"
                                            >
                                                <audio
                                                    src="{{'/'.$podcast->file_path}}"
                                                    controls
                                                ></audio>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>We will upload podcasts soon. Frequently visit this page to get our latest podcasts.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // get videos, photos and podcasts buttons
        var videosBtn = document.getElementById("videos-btn");
        var photosBtn = document.getElementById("photos-btn");
        var podcastsBtn = document.getElementById("podcasts-btn");

        // get videos, photos and podcasts sections
        var videos = document.getElementById("videos");
        var photos = document.getElementById("photos");
        var podcasts = document.getElementById("podcasts");

        // set videos and podcasts sections to hidden
        videos.style.display = "none";
        podcasts.style.display = "none";
        photos.style.display = "block";

        // if videos button is clicked show videos section
        videosBtn.addEventListener("click", function() {
            videos.style.display = "block";
            photos.style.display = "none";
            podcasts.style.display = "none";
        });

        // if photos button is clicked show photos section
        photosBtn.addEventListener("click", function() {
            videos.style.display = "none";
            photos.style.display = "block";
            podcasts.style.display = "none";
        });

        // if podcasts button is clicked show podcasts section
        podcastsBtn.addEventListener("click", function() {
            videos.style.display = "none";
            photos.style.display = "none";
            podcasts.style.display = "block";
        });

    </script>

</div>
