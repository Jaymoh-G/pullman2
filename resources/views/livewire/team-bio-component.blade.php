<div>
    <style>
        .card-img-top {
            object-fit: cover !important;
            width: 230px !important;
            height: 330px !important;
        }
    </style>
    <div class="team-details">
        <!-- Home -->

        <div class="home">
            <div
                class="home_background"
                data-parallax="scroll"
                style="
                    background-image: linear-gradient(
                        rgba(0, 0, 0, 0.5),
                        rgba(0, 0, 0, 0.5)
                    );
                    height: 180px;
                "
                data-image-src="/../images/power2.jpg"
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
                                            <a
                                                href="{{
                                                    route('homepage.index')
                                                }}"
                                                >Home</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="{{
                                                    route('frontend.team')
                                                }}"
                                                >Team</a
                                            >
                                        </li>
                                        <li>{{$teamMember->name}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container other-teams">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="team-card">
                        <img
                            class="card-img-top"
                            src="{{'/'.$teamMember->image}}"
                            alt="{{$teamMember->name}}"
                        />
                    </div>
                    <div class="team-name">
                        <a
                            href="{{route('frontend.team.details',['slug'=>$teamMember->slug])}}"
                        >
                            <h2>{{$teamMember->name}}</h2></a
                        >
                        <p>{{$teamMember->position}}</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    {!!$teamMember->bio!!}
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
                    <!-- Subscribe form -->
                    <div class="col-lg-12 col-md-12 service_col text-center">
                        <div class="subscribe">
                            <input
                                class="name mr-1"
                                type="text"
                                placeholder="Name"
                                name="name"
                                required
                            />
                            <input
                                class="mail mr-1"
                                type="text"
                                placeholder="Email address"
                                name="mail"
                                required
                            />
                            <button class="subscribe-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
