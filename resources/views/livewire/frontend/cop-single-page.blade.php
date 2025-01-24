<div class="blog-section">
    <style>
        .btn-success {
            color: #fff !important;
            background-color: #28a745 !important;
            border-color: #28a745 !important;
        }
        @media only screen and (max-width: 480px) {
            .fakeimg img{
                width: 98% !important;
                height: auto !important;
                object-fit: cover;

            }
            .blog-section .btn-part .post-social-wrapper {
    margin-left: 0em;
    margin-top: 1em;
}

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
                                    <li><a href="{{route('homepage.index')}}">Home</a></li>
                                    <li><a href="{{route('frontend.latest')}}">Latest</a></li>
                                    <li>{{$category}}</li>
                                    <li>{{$title}}</li>

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
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="detail" wire:ignore>
                        <h2>
                        {{$blog->title}}
                        </h2>
                        <div class="blog-details">
                            <p class="blog-date">
                                <i class="far fa-clock"></i>{{$blog->created_at->format('d')}} {{$blog->created_at->format('F, Y')}}
                            </p>
                            <p class="blog-author">
                                <span>Posted by:</span> {{$blog->author}}</p>
                            <!-- <p class="blog-comment">
                                <i class="far fa-comment"></i>Comment
                            </p> -->
                        </div>

                            <div class="fakeimg">
                                <img src="{{"/".$blog->image}}" alt="{{$blog->title}}" srcset="" style="object-fit:cover; width:100%;">
                            </div>
                        <p class="cat-name"><i>Category : {{$blog->category->name}} | tags:

                        @if($blog->tags)
                                @foreach(unserialize($blog->tags) as $tag)
                                    <a href="{{route('frontend.cop.categories',['subCategorySlug'=>$blog->category->slug])}}?tag={{$tag}}">{{$tag}}</a>
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @endif

                        </i> </p>

                        <div class="about_text"> {!!$blog->body!!}</div>
                        <div style="text-align: center;">
                            @if ($blog->link)
                                <a href="{{$blog->link}}" class="btn btn-lg btn-success">
                                    Endorse This Treaty
                                </a>
                            @endif
                        </div>

                    </div>
                    <div class="comment pt-5">
                        <h3>Leave a Comment</h3>
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
                            @endif
                        <form wire:submit.prevent="createComment({{$blog->id}})"  class="comment-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group comment-form-author">
                                        <input placeholder="Name *" class="form-control" wire:model="user_name" type="text" value="" size="30" aria-required="true">
                                    </div>
                                    @error('user_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group comment-form-email">
                                        <input placeholder="E-mail *" class="form-control" wire:model="email" type="email" value="" size="30" aria-required="true">
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="input-group comment-form-url">
                                        <input placeholder="Website" class="form-control" wire:model="url" type="text" value="" size="30">
                                    </div>
                                </div> --}}
                            </div>
                                <div class="input-group comment-form-comment">
                                    <textarea placeholder="Message *" class="form-control" wire:model="comment" rows="9" aria-required="true" spellcheck="false"></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 2;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 2;" class="cGcvT"></grammarly-extension>
                                    @error('comment')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            <div class="btn-part">
                                <button  class="btn btn-comment pt-1">
                                    <i class="fas fa-chevron-right"></i>
                                    Post a Comment
                                </button>
                                <div class="post-social-wrapper">
                                    <span><i class="fa fa-share-alt"></i>Share:</span>
                                    <div class="post-social">
                                        <a
                                            title="Share this"
                                            href="https://www.facebook.com/sharer.php?u={{Request::url()}}"
                                            target="_blank"
                                            class="facebook-share"
                                            >
                                                <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a
                                            title="Tweet this"
                                            href="https://twitter.com/share?url={{Request::url()}}&text={{$blog->title}}"
                                            target="_blank"
                                            class="twitter-share"
                                            >
                                                <i class="fab fa-twitter"></i>
                                        </a>
                                        <a
                                            title="Share with whatsapp"
                                            href="https://api.whatsapp.com/send?text={{$blog->title}} {{Request::url()}}"
                                            target="_blank"
                                            class="whatsapp-share"
                                            >
                                                <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                    </div>

                    <div class="comment-sec" style="margin: 25px" >
                        <!-- Top part of comment section -->
                        <p>{{count($blogComments)}} Comment{{count($blogComments)==1?'':'s'}}</p>
                        @forelse ($blogComments as $comment)
                            <div class="row top-part">
                                <div class="col-lg-2">
                                    <div class="user"><img src="/assets/images/user_icon.png" alt="" srcset=""></div>
                                </div>
                                <div class="col-lg-8 user-comment">
                                    <p class="name">{{$comment->user_name}}</p>
                                    <p class="date-time">{{$comment->created_at->format('F d, Y \a\t h:ia')}}</p>
                                    {{-- <P class="date-time"> November 12. 2018 at 7:50pm</P> --}}
                                    <p class="reply-msg">{{$comment->comment}}</p>
                                </div>
                                {{-- <div class="col-lg-2">
                                    <div class="reply-text"><a id="reply-text" wire:click="replyClick({{$comment->id}})" href="#reply-form">Reply</a></div>
                                </div>--}}
                            </div>
                            {{-- <div class="row reply-part">
                                <div class="col-lg-2">
                                <div class="user"><img src="/assets/images/user_icon.png" alt="" srcset=""></div>
                                </div>
                                <div class="col-lg-7 user-reply">
                                    <p class="name">Director</p>
                                    <P class="date-time"> November 12. 2018 at 7:50pm</P>
                                    <p class="reply-msg">2950 hours</p>
                                </div>
                            </div> --}}
                        @empty
                            <p></p>
                        @endforelse
                        <div id="reply-form">
                            <div class="row reply-form" >
                                <div class="col-lg-12">
                                    <p class="mt-5 mb-3 comment-header">Reply to Comment</p>
                                    <form wire:submit.prevent="saveCommentReply"  class="comment-form">
                                        <label for="comment">Comment:</label><br>
                                            <textarea wire:model="comment" rows="6" cols="60"></textarea><br>
                                        <label for="name">Name:</label><br>
                                            <input type="text" wire:model="user_name"/><br>
                                        <label for="name">Email:</label><br>
                                            <input type="text" wire:model="email"/><br>
                                        <button id="close-form" class="btn btn-comment text-white pt-1">
                                            Post Comment
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="sidebar">
                        <!-- Archives -->
                        <div class="sidebar_archives sidebar_section" style="margin-top: -5px">

                        <!-- Search bar section -->
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class=" search form-control my-0 py-1 amber-border" type="text" placeholder="Search..." aria-label="Search">
                            <div class="input-group-append">
                                <span class="input-group-text amber " id="basic-text1">
                                <i class="fas fa-search text-grey" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <hr>

                        <!-- Categories section -->
                        <div class="category">
                            <div class="vc_wp_categories wpb_content_element">
                                <aside class="widget widget_categories">
                                    <h5 class="widget_title">Categories</h5>
                                        <ul>
                                            @foreach($categories as $category)
                                                <a href={{route('frontend.cop.categories',['subCategorySlug'=>$category->slug])}}>
                                                    <button class="sidebar-button">{{$category->name}}</button>
                                                </a>
                                            @endforeach

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



