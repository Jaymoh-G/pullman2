<div class="gallery-page">
    <head>
        <link rel="stylesheet" href="/css/lightbox.min.css">
    </head>
    <style>
        .gallery-page .category {
            margin-top: -0.5em;
            margin-left: 1em;
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
                                    <li><a href="{{route('homepage.index')}}">Home</a></li>
                                    <li>Gallery</li>
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

                <!-- Sidebar -->
                <div class="col-lg-2 col-md-3">
                    <!-- Categories section -->
                        <div class="category">
                            <div class="vc_wp_categories wpb_content_element">
                                <aside class="widget widget_categories">
                                    <h5 class="widget_title">Galleries</h5>
                                        <ul>
                                            <div class="container-full">
                                            <div class="cat-btns row">
                                            @forelse($galleries as $gallery)
                                            <div class="col-lg-12 col-md-12 col-6">

                                                    <a href="{{route('frontend.gallery',['albumId'=>$gallery->id])}} "><button   style=" border: 1px solid #111112;
    margin: 6px auto;
    padding: 7px;
    font-weight: 500; min-width: 100%">{{$gallery->title}}</button></a>

                                            </div>
                                                @empty <p>No gallery photo</p>
                                                @endforelse
                                               </div>
                                            </div>
                                        </ul>
                                </aside>
                            </div>
                        </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-12 album-details">
                    <div class="detail">
                        <div class="album-header">
                            <h2>
                                {{$album->title}}
                            </h2>
                            <div class="blog-details">
                                <p class="blog-date">
                                    <i class="far fa-clock"></i>{!! htmlspecialchars_decode($album->created_at->format('d<\s\u\p>S</\s\u\p> M')) !!}
                                <p class="blog-author">
                                    <span>Posted by:</span> {{$album->created_by}}</p>

                            </div>
                        </div>

                        <div class="container mb-3">
                            <div class="row other-imgs">
                                @forelse ($photos as $photo)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
                                    <a href="{{'/'.$photo->image}}" data-title="{{$photo->title}}" data-lightbox="myGallery"><img src="{{'/'.$photo->image}}"  srcset=""></a>
                                </div>
                                @empty
                                    <p>No photo on this album</p>
                                @endforelse
                            </div>
                        </div>




                    </div>

                </div>



            </div>
        </div>
    </div>
</div>
