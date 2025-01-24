<div class="searchpage">
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
                                    <li>Search</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="searches">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="searches-found">
                        <h2>
                             Search Results For: <span> {{$searchTerm}}</span>
                        </h2>
                        <div class="searches-found-text">
                            <p>
                                We found {{$media->count()+$blogs->count()+$publications->count()+$events->count()}} results for your search
                            </p>
                        </div>
                        @if ($media->count() > 0)
                            @foreach ($media as $mediaItem)                               
                                @if ($mediaItem->category == 'podcast')
                                    <div class="search-detail">
                                        <h2>{{$mediaItem->title}}</h2>
                                        <p class="search-date">
                                        <i class="far fa-clock pr-1"></i> {!! htmlspecialchars_decode($mediaItem->created_at->format('F d<\s\u\p>S</\s\u\p>, Y')) !!}
                                        </p>
                                        <p>{{substr(strip_tags($mediaItem->description), 0, 100)}}</p>
                                        <div id="audio-player-container">
                                            <audio
                                                src="{{'/'.$mediaItem->file_path}}"
                                                controls
                                            ></audio>
                                        </div>
                                        <hr>
                                    </div>                                    
                                @endif                                                            
                            @endforeach  
                        @endif
                        
                        @if ($blogs->count() > 0)
                            @foreach ($blogs as $blog)                               
                                <div class="search-detail">
                                    <h2>{{$blog->title}}</h2>
                                    <p class="search-date">
                                        <i class="far fa-clock pr-1"></i> {!! htmlspecialchars_decode($blog->created_at->format('F d<\s\u\p>S</\s\u\p>, Y')) !!}
                                    </p>                                   
                                    <p>{{substr(strip_tags($blog->body), 0, 100)}}</p>
                                    <a href="{{route('frontend.blog.details', ['category'=>$blog->category->name,'slug'=>$blog->slug])}}" class="btn btn-primary">Read More</a>
                                    <hr>
                                </div>                                    
                            @endforeach                            
                        @endif

                        @if ($publications->count() > 0)
                            @foreach ($publications as $publication)
                                <div class="search-detail">
                                    <h2>{{$publication->title}}</h2>
                                    <p class="search-date">
                                        <i class="far fa-clock pr-1"></i> {!! htmlspecialchars_decode($publication->created_at->format('F d<\s\u\p>S</\s\u\p>, Y')) !!}
                                    </p>                                   
                                    <p>{!!substr(strip_tags($publication->description), 0, 100)!!}</p>
                                    <a href="{{route('frontend.publications.detail',['slug'=>$publication->slug])}}" class="btn btn-primary">Read More</a>
                                    <a
                                        href="{{'/'.$publication->file_path}}"
                                        target="_blank"
                                        class="btn btn-primary pt-1"
                                    >
                                        <i
                                            class="fa fa-cloud-download"
                                            aria-hidden="true"
                                        ></i>
                                        Download
                                    </a>
                                    <hr>
                                </div>
                            @endforeach
                        @endif

                        @if ($events->count() > 0)
                            @foreach ($events as $event)
                                <div class="search-detail">
                                    <h2>{{$event->title}}</h2>
                                    <p class="search-date">
                                        <i class="far fa-clock pr-1"></i> {!! htmlspecialchars_decode($event->created_at->format('F d<\s\u\p>S</\s\u\p>, Y')) !!}
                                    </p>      
                                    <p>Event name: {{$event->name}}</p>                             
                                    <p>{{substr(strip_tags($event->description), 0, 100)}}</p>
                                    <a href="{{route('frontend.event.details', ['slug'=>$event->slug])}}" class="btn btn-primary">Read More</a>
                                    <hr>
                                </div>
                            @endforeach                            
                        @endif                       
                    </div>                       
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="sidebar">
                        <!-- Archives -->
                        <div class="sidebar_archives sidebar_section" style="margin-top: -5px">

                        <!-- Search bar section -->
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input wire:model="query" class=" search form-control my-0 py-1 amber-border" type="text" placeholder="Search..." aria-label="Search">
                            <div class="input-group-append">
                                <button type="submit" wire:click="search" >
                                    <span class="input-group-text amber " id="basic-text1">
                                        <i class="fas fa-search text-grey" aria-hidden="true"></i></span>
                                </button>
                                
                            </div>
                        </div>
                        <hr>

                        <!-- Categories section -->
                        <div class="category">
                            <div class="vc_wp_categories wpb_content_element">
                                <aside class="widget widget_categories">
                                    <h5 class="widget_title">Categories</h5>
                                        <ul>
                                            <li class="cat-item cat-item-1">
                                                <a href="#">Power Shift News</a>
                                            </li>
                                           

                                        </ul>
                                        <h5 class="widget_title">Recent Posts</h5>
                                        <ul>
                                            <li class="cat-item cat-item-1">
                                                <a href="#">Power Shift News</a><br>
                                                <a href="#">Climate News</a><br>
                                                <a href="#">Climate change</a>
                                            </li>
                                            
                                           

                                        </ul>
                                </aside>
                            </div>
                        </div>
                        <hr>
                        <!-- Twitter section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
