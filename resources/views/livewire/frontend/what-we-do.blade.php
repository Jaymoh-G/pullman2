<!-- <link rel="stylesheet" type="text/css" href="styles/renewable energy.css" /> -->
<link rel="stylesheet" type="text/css" href="styles/responsive.css" />
<link rel="stylesheet" type="text/css" href="styles/pages.css" />

<div class="home whatwedo-page">
    <div
        class="home_background parallax-window"
        data-parallax="scroll"
        style="
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            );
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
                                <li>What we do</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="energy resilience what-we-do">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center">
                <h1 style="font-weight: 600; font-size: 30px;color: black;">WE ARE THE BEST AT WHAT WE DO</h1>
                <p class="pb-3">
                At Pullman Construction, we uphold the highest standards,
                where excellence is not just a goal but our standard.
                With a track record of successfully completing challenging
                projects to the utmost satisfaction of our customers,
                we pride ourselves on being industry leaders.
                Our unwavering commitment to every project we undertake
                remains steadfast, ensuring exceptional results every time.
                Contact us today to experience the best in construction services.
                Let's build something extraordinary together.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 1 -->
<div class="container-full section2 section1">
    <div class="container">
        <div class="row">
            <div class="climate-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img src="{{ asset('images/water.png') }}" alt="" srcset="" />
                <h2 style="color:#111112;">Civil Works</h2>
                <p>
                    Our civil projects vary. We would love to discuss your project. Kindly get in touch for  estimates.
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'civil-works'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
            <div class="energy-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <img src="{{ asset('images/earthworks.png') }}" alt="" srcset="" />
                <h2 style="color:#111112;">Excavation and Demolition</h2>
                <p>
                With our expertise in earthmoving and waste management,
                we provide reliable solutions for excavation and demolition
                needs, guaranteeing safe and efficient handling of
                materials to meet project requirements.
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'excavation-and-demolition'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
        </div>
    </div>
</div>

<!-- SECTION 2  -->
<div class="container-full section2">
    <div class="container">
        <div class="row">
            <div class="climate-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img
                    src="{{ asset('images/crane.png') }}"
                    alt=""
                    srcset=""
                />
                <h2 style="color:#111112;">Equipments and Machine Hire</h2>
                <p>
                Access top-quality machinery for your construction needs
                with our Equipments and Machine Hire service, offering a
                diverse range of equipment for rent, ensuring optimal
                performance and productivity on-site.
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'equipment-and-machine-hire'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
            <div class="energy-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
                <img src="{{ asset('images/materials.png') }}" alt="" srcset="" />
                <h2 style="color:#111112;">Building Materials Supply</h2>
                <p>
                Our Building Materials Supply service sources and delivers
                essential construction materials, including cement, steel,
                and bricks, ensuring timely availability and quality
                assurance for projects of any scale.
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'building-materials-supply'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
        </div>
    </div>
</div>

<!-- About fossil fuel -->
<div class="whatwedo-cta">
    <div class="cta-content">
        <h2>Crafting Excellence in Construction</h2>
        <p>
        At Pullman Construction, we pride ourselves
        on delivering top-quality construction solutions
        tailored to meet your every need. From groundbreaking
        projects to meticulous attention to detail,
        trust us to build your vision into reality
        </p>
        <p>
        <a href="{{ route('frontend.contactUs') }}">
                    <button class="btn btn-primary pt-1">
                        Get In Touch
                        <i class="pl-1 fas fa-chevron-right text"></i></button
                ></a>
        </p>
    </div>
</div>

<!-- GET IN TOUCH SECTION -->
<div class="get-in-touch">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-9">
                <p class="text-white">
                    Looking to work with a seasoned and innovative team for construction solutions
                </p>
            </div>
            <div class="col-lg-3">
                <a href="{{ route('frontend.contactUs') }}">
                    <button class="btn btn-primary pt-1">
                        Get In Touch
                        <i class="pl-1 fas fa-chevron-right text"></i></button
                ></a>
            </div>
        </div>
    </div>
</div>
