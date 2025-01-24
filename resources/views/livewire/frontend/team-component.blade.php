<div class="team-details">
    <style>
        .team-img {
            object-fit: cover;
            height: 280px !important;
            width: 345px !important;
        }

        @media only screen and (max-width: 1199px) {
            .director-img {
                object-fit: cover;
                height: 300px !important;
                width: 260px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            .bio-info {
                text-align: center;
            }
            .styled-h2 {
                text-align: center !important;
                padding-left: 0em !important;
            }
            .member-desc .col-lg-4 p {
                text-align: center;
                margin-bottom: 0em;
            }
            .team-details .card-img-top {
                width: 300px !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .bio-info {
                text-align: center;
            }
            .team-card {
                width: 100%;
            }

            .team-name > a > h2,
            .team-name > p,
            .team-name > div {
                text-align: center;
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
                height: 180px;
            "
            data-image-src="{{ asset('images/power2.jpg') }}"
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
                                    <li>Team</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container member-desc">
        <div class="row">
            @if (count($director) > 0)
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                <img
                    class="card-img-top director-img"
                    src="{{'/'.$this->director[0]->image}}"
                    alt="{{$this->director[0]->name}}"
                />
                <h2 class="styled-h2">{{$this->director[0]->name}}</h2>
                <p>{{$this->director[0]->position}}</p>
                <div
                    class="bio-info"
                    style="margin: auto; text-align: center !important"
                >
                    <a
                        href="{{$this->director[0]->twitter}}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 director-bio">
                {!!$this->director[0]->bio!!}
            </div>
            @else
            <p>Director not added</p>
            @endif
        </div>
    </div>
    <div class="other-teams">
        <div class="container">
            <h2 class="styled-h2">Team Leads</h2>
            <div class="row mt-4">
                @forelse ($teamMembers as $teamMember)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="team-card">
                        <img
                            class="card-img-top team-img"
                            src="{{'/'.$teamMember->image}}"
                            alt="{{$teamMember->name}}"
                        />
                        <div class="member-bio">
                            <div class="bio-info">
                                <h2>{{$teamMember->name}}</h2>
                                <p>
                                    {{$teamMember->email}}
                                    {{$teamMember->position}}
                                </p>

                                @if ($teamMember->twitter)
                                <a
                                    href="{{$teamMember->twitter}}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif @if ($teamMember->linkedIn)
                                <a
                                    href="{{$teamMember->linkedIn}}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i
                                        class="fab fa-linkedin"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    ></i>
                                </a>
                                @endif

                                <a
                                    href="{{route('frontend.team.details',['slug'=>$teamMember->slug])}}"
                                    ><p>Read more</p></a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="team-name">
                        <a
                            href="{{route('frontend.team.details',['slug'=>$teamMember->slug])}}"
                        >
                            <h2>{{$teamMember->name}}</h2></a
                        >
                        <p>{{$teamMember->position}}</p>

                        <div
                            style="margin-bottom: 2em; padding-left: 1px"
                            class="col-lg-11 col-md-11"
                        >
                            <!-- {!!$teamMember->excerpt()!!} -->
                        </div>
                    </div>
                </div>
                @empty
                <p>No team member added</p>
                @endforelse
                <div class="other-teams">
                    <h2 class="styled-h2">Our Team</h2>
                    <div class="row mt-4">
                        <div
                            class="col-12 group-photo"
                            style="text-align: center"
                        >
                            <img
                                src="{{ asset('images/PSATeam.jpg') }}"
                                alt=""
                                srcset=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container"></div>
</div>
