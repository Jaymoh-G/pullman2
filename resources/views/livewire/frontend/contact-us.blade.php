<div>
    <link rel="stylesheet" type="text/css" href="styles/contact.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="styles/contact_responsive.css"
    />

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
                                    <li>
                                        <a href="{{ route('homepage.index') }}"
                                            >Home</a
                                        >
                                    </li>
                                    <li>Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="section_title">
                        <h1
                            style="
                                font-weight: 600;
                                font-size: 30px;
                                color: black;
                            "
                        >
                            Get in touch with Pullman Excavators
                        </h1>
                    </div>
                    <div class="contact_text"></div>
                    <ul class="contact_about_list">
                        <li>
                            <a href="tel:+254726634673">
                                <div class="contact_about_icon">
                                    <img src="images/phone-call.svg" alt="" />
                                </div>
                                <span>Tell: +254 726 634 673</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+254 202 634 673">
                                <div class="contact_about_icon">
                                    <img src="images/phone-call.svg" alt="" />
                                </div>
                                <span>Office: +254 202 634 673</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:pullmanconstructions@gmail.com">
                                <div class="contact_about_icon">
                                    <img src="images/envelope.svg" alt="" />
                                </div>
                                <span>pullmanconstructions@gmail.com</span></a
                            >
                        </li>
                        <li>
                            <a
                                href="https://goo.gl/maps/KxsqzZXMhyz7Pqoo6"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <div class="contact_about_icon">
                                    <img src="images/placeholder.svg" alt="" />
                                </div>
                                <span>Nairobi, Kenya</span></a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-6 form_col">
                    <div class="contact_form_container">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <form
                            action="#"
                            id="contact_form"
                            class="contact_form"
                            wire:submit.prevent="send"
                        >
                            <div class="row">
                                <div class="col-md-6 input_col">
                                    <div class="input_container input_name">
                                        <input
                                            type="text"
                                            class="contact_input"
                                            wire:model="name"
                                            placeholder="Name"
                                            required="required"
                                        />
                                        @error('name')
                                        <span class="error text-danger">{{
                                            $message
                                        }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 input_col">
                                    <div class="input_container">
                                        <input
                                            type="telephone"
                                            class="contact_input"
                                            wire:model="phone"
                                            placeholder="Phone"
                                            required="required"
                                        />
                                        @error('phone')
                                        <span class="error text-danger">{{
                                            $message
                                        }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="input_container">
                                <input
                                    type="text"
                                    class="contact_input"
                                    wire:model="subject"
                                    placeholder="Subject"
                                    required="required"
                                />
                                @error('subject')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                            </div>
                            <div class="input_container">
                                <textarea
                                    class="contact_input contact_text_area"
                                    placeholder="Message"
                                    wire:model="message"
                                    required="required"
                                ></textarea>
                                @error('message')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                            </div>
                            <div class="input_container" wire:ignore>
                                {!! NoCaptcha::renderJs() !!} {!!
                                NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                            </div>
                            <button class="button contact_button subscribe-btn">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row map_row">
                <div class="col">
                    <div class="contact_map">
                        <div class="map">
                            <div id="google_map" class="google_map">
                                <div class="map_container">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d127642.00860789666!2d36.817222!3d-1.286389!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwMTcnMTEuMCJTIDM2wrA0OScwMi4wIkU!5e0!3m2!1sen!2snl!4v1709054263886!5m2!1sen!2snl"
                                        width="100%"
                                        height="480"
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
