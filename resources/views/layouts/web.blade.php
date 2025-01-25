<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Google tag (gtag.js) -->
        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=AW-329295031"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "AW-329295031");
        </script>
        <!-- End of Google tag (gtag.js) -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/nofavicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/favicon-16x16.png"
        />
        <link rel="manifest" href="/site.webmanifest" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @if(isset($title))
        <title>{{ $title }}</title>
        <meta
            name="description"
            content="{{ isset($metaDescription) ? $metaDescription : $title }}"
        />
        @else

        <title>Pullman Excavators Kenya</title>
        <meta name="description" content="Looking for excavation and demolition services in Nairobi, Kenya? Call: +254 726 634 673" />
        @endif
        <!-- Google Tag Manager -->
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    "gtm.start": new Date().getTime(),
                    event: "gtm.js",
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-TG9ZBJK");
        </script>
        <!-- End Google Tag Manager -->
        <link
            href="{{ asset('assets/css/lib/bootstrap.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,700&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{
                asset('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')
            }}"
        />
        {{--
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/animate.css') }}"
        />
        --}}
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/main_styles.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive1600.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive-1200-1600.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive991-1199.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive991.css') }}"
        />

        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive767.css') }}"
        />

        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive480.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive400.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive320.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('styles/responsive280.css') }}"
        />

        <style>
            .about_image {
                position: absolute;
                right: 0;
                top: 0;
                width: 100%;
            }
            @media only screen and (max-width: 991px) {
                .about_image {
                    position: absolute;
                    right: 0;
                    top: 0;
                }
                .about_content {
                    position: relative;
                    right: auto;
                    bottom: auto;
                    /* text-align: center; */
                }
                .about {
                    width: 100%;
                    background: #ffffff;
                    padding-top: 0px;
                    padding-bottom: 0px;
                }
                .services {
                    width: 100%;
                    background: #ffffff;
                    padding-top: 0px;
                    padding-bottom: 0px;
                }
                .content {
                    margin-top: 90%;
                }
                .section_title {
                    padding-top: 45px;
                }
            }
        </style>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
            integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        @livewireStyles @php $canonicalUrl = request()->url(); @endphp

        <link rel="canonical" href="{{ $canonicalUrl }}" />
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <!-- <noscript
            ><iframe
                src="https://www.googletagmanager.com/ns.html?id=GTM-TG9ZBJK"
                height="0"
                width="0"
                style="display: none; visibility: hidden"
            ></iframe
        ></noscript> -->
        <!-- End Google Tag Manager (noscript) -->
        <div class="super_container">
            {{-- Header section --}}
            @livewire('frontend.header-component',['activePage'=>isset($activePage)?$activePage:''])

            {{ $slot }}

            {{-- Footer section --}}
            @livewire('frontend.footer-component')
        </div>

        <!-- START Bootstrap-Cookie-Alert 
        <div
            class="alert text-center cookiealert"
            style="color: #111112"
            role="alert"
        >
            <b>Cookie consent. </b> We are using cookies to ensure you get the
            best experience on our website.
            <a
                href="https://cookiesandyou.com/"
                style="color: #EE1C25"
                target="_blank"
                >Learn more</a
            > 

            <button type="button" class="btn btn-primary btn-sm acceptcookies">
                Allow Cookies
            </button>
        </div>
        END Bootstrap-Cookie-Alert -->

        <!-- <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    {
                        pageLanguage: "en",
                        includedLanguages: "en,fr",
                    },
                    "google_translate_element"
                );
            }
        </script> -->
        <script
            type="text/javascript"
            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
        ></script>
        <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
        <script src="{{
                asset('assets/plugins/parallax-js-master/parallax.min.js')
            }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="/js/lightbox.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        @livewireScripts
    </body>
</html>
