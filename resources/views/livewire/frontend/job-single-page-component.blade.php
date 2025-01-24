<div class="blog-section">
    <style>
        .hide {
            display: none;
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
            data-image-src="{{ asset('/images/power2.jpg') }}"
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
                                    <li>Job Post</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blogs jobs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="detail">
                        <h2>
                            {{$job->title}}
                        </h2>
                        <div class="blog-details">
                            <p class="blog-date">
                                <i class="far fa-clock"></i>
                                <span>Posted on:</span>
                                {{$job->updated_at->format('d')}}
                                {{$job->updated_at->format('F, Y')}}
                            </p>
                        </div>
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <div class="about_text">
                            <p>{!!$job->description!!}</p>
                        </div>

                        <div class="app-form">
                            <h4>Apply for this post.</h4>
                            <p>(Pdf, doc or docx files allowed only)</p>
                            <hr style="width: 100%" />
                            @include('job.application-form')
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Archives -->
                        <div
                            class="sidebar_archives sidebar_section"
                            style="margin-top: -5px"
                        >
                            <!-- Other Jobs Section -->
                            <div class="category">
                                <div
                                    class="vc_wp_categories wpb_content_element"
                                >
                                    <aside class="widget widget_categories">
                                        <h5 class="widget_title">
                                            Other Job Posts
                                        </h5>
                                        <ul>
                                            @forelse($Jobs->where('deadline',
                                            '>=', \Carbon\Carbon::now()) as
                                            $job)
                                            <a
                                                href="{{ route('frontend.careers.details', $job->slug) }}"
                                            >
                                                <button
                                                    class="sidebar-button"
                                                    href=""
                                                >
                                                    {{$job->title}}
                                                </button>
                                            </a>
                                            @empty
                                            <p></p>
                                            @endforelse
                                        </ul>
                                    </aside>
                                </div>
                            </div>
                            <hr />

                            <!-- Twitter section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
