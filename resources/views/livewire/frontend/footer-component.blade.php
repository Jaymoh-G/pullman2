<footer class="footer">
    <div class="footer_container pl-4 pr-4">
        <div class="container">
            <div class="row">
                <!-- Footer - About -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer_col">
                    <div class="footer_about footer_column">
                        <div class="footer_about_logo">
                            <img
                                style="height: 60px; width: 150px"
                                class="ml-1"
                                src="{{
                                    asset('/images/logo_pullman-rsz.png')
                                }}"
                            />
                        </div>
                        <div class="footer_about_text">
                            <p>Earth works experts</p>
                        </div>
                    </div>
                </div>

                <!-- Footer - Links -->

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer_col">
                    <div class="footer_links footer_column">
                        <div class="footer_title">Useful Links</div>
                        <ul class="footerlinks">
                            <li>
                                <a href="{{ route('homepage.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.aboutus') }}"
                                    >About Us</a
                                >
                            </li>

                            <!-- @foreach ($categories as $category)
                            <li class="dropdown">
                                <a
                                    href="{{route('frontend.blog.categories',['categorySlug'=>$category->slug])}}"
                                    ><span>{{$category->name}}</span>
                                    <i class="bi bi-chevron-right"></i
                                ></a>
                            </li>
                            @endforeach -->

                            <li>
                                <a href="{{ route('frontend.contactUs') }}"
                                    >Contact Us</a
                                >
                            </li>
                            <li>
                                <a href="{{ route('frontend.testimonials') }}"
                                    >Testimonials</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer - News -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer_col">
                    <div class="footer_links footer_column">
                        <div class="footer_title">What We Do</div>
                        <ul class="footerlinks">
                            <li>
                                <a
                                    href="{{route('frontend.whatWeDo.page',['slug'=>'excavation-and-demolition'])}}"
                                    >Excavation and Demolition</a
                                >
                            </li>
                            <li>
                                <a
                                    href="{{route('frontend.whatWeDo.page',['slug'=>'civil-works'])}}"
                                    >Civil Works</a
                                >
                            </li>

                            <!-- @foreach ($categories as $category)
                            <li class="dropdown">
                                <a
                                    href="{{route('frontend.blog.categories',['categorySlug'=>$category->slug])}}"
                                    ><span>{{$category->name}}</span>
                                    <i class="bi bi-chevron-right"></i
                                ></a>
                            </li>
                            @endforeach -->

                            <li>
                                <a
                                    href="{{route('frontend.whatWeDo.page',['slug'=>'equipment-and-machine-hire'])}}"
                                    >Equipments and Machine Hire</a
                                >
                            </li>

                            <li>
                                <a
                                    href="{{route('frontend.whatWeDo.page',['slug'=>'building-materials-supply'])}}"
                                    >Building materials supply</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer_col">
                    <div class="footer_about footer_column">
                        <div class="footer_title">Contact</div>
                        <ul class="footer_about_list">
                            <li>
                                <div class="footer_about_icon">
                                    <i
                                        class="fa fa-phone"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                                <a href="tel:+254726634673">
                                    <span> Tell: +254 726 634 673</span></a
                                >
                            </li>

                            <li>
                                <div class="footer_about_icon">
                                    <i
                                        class="fa fa-phone"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                                <a href="tel:+254202634673">
                                    <span>Office: +254 202 634 673</span></a
                                >
                            </li>

                            <li>
                                <div class="footer_about_icon">
                                    <i
                                        class="fa fa-envelope"
                                        aria-hidden="true"
                                    ></i>
                                </div>

                                <a href="mailto:info@pullmanexcavatorskenya.com"
                                    ><span
                                        >info@pullmanexcavatorskenya.com</span
                                    ></a
                                >
                            </li>
                            <li>
                                <div class="footer_about_icon">
                                    <i
                                        class="fa fa-map-marker"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                                <a
                                    href="#"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <span>Nairobi, Kenya<br /> </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer_about_text">
                    <p>Total Site Visits: {{ 4908 + $visitorCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="copyright_content d-flex flex-lg-row flex-column align-items-lg-center justify-content-start"
                    >
                        <div class="cr">
                            Copyright &copy;2025 All rights reserved by
                            <a href="" target="_blank"
                                ><span>Pullman Construction</span></a
                            >
                        </div>
                        <div class="footer_social ml-lg-auto mr-5 mt-2 mb-2">
                            <ul>
                                <li>
                                    <a href="#"
                                        ><i
                                            class="fab fa-facebook"
                                            aria-hidden="true"
                                        ></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i
                                            class="fab fa-twitter"
                                            aria-hidden="true"
                                        ></i
                                    ></a>
                                </li>
                                <li>
                                    <a
                                        style="
                                            position: fixed;
                                            width: 39px;
                                            height: 39px;
                                            bottom: 30px;
                                            background-color: #25d366;
                                            border-radius: 0px;
                                            text-align: center;
                                            font-size: 30px;
                                            box-shadow: 2px 2px 3px #999;
                                            z-index: 100;
                                            right: 20px;
                                        "
                                        href="https://wa.me/254726634673?text=Hello.+I+got+your+contacts+from+your+website+and+I%27m+interested+in+your+services."
                                        ><i
                                            class="fab fa-whatsapp-square my-float"
                                            style="
                                                color: white;
                                                font-size: 36px;
                                                height: fit-content;
                                            "
                                            aria-hidden="true"
                                        ></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i
                                            class="fab fa-linkedin"
                                            aria-hidden="true"
                                        ></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
