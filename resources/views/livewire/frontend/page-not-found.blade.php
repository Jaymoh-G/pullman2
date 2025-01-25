<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/carousel.css') }}" />
    <style>
        .styled-h2 {
            color: #EE1C25;
        }
    </style>
    <div class="super_container">
        <div class="home">
            <div
                class="about-us home_background parallax-window"
                style="
                    background-image: linear-gradient(
                        rgba(0, 0, 0, 0.5),
                        rgba(0, 0, 0, 0.5)
                    );
                "
                data-parallax="scroll"
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
                                            <a
                                                href="{{
                                                    route('homepage.index')
                                                }}"
                                                >Home</a
                                            >
                                        </li>
                                        <li>404</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about aboutpage">
            <div class="container mb-3">
                <div class="row">
                    <!-- About Content -->
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="about-title">
                            <h2>404 Error Page not found</h2>
                        </div>
                        <div class="about_text">
                            <p>
                                We’re sorry, the page you have looked for does
                                not exist in our database! Maybe go to our
                            </p>
                        </div>

                        <div class="">
                            <a
                                href="{{ route('homepage.index') }}"
                                class="btn btn-primary;"
                                style="width: 202px; height: 35px"
                                >Back to Homepage</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
