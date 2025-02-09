<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Pullman Construction and Equipment Hiring</title>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"
        />

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff" />
        <!-- Retina iPad Touch Icon-->
        <link
            rel="apple-touch-icon"
            sizes="144x144"
            href="http://placehold.it/144.png/000/fff"
        />
        <!-- Retina iPhone Touch Icon-->
        <link
            rel="apple-touch-icon"
            sizes="114x114"
            href="http://placehold.it/114.png/000/fff"
        />
        <!-- Standard iPad Touch Icon-->
        <link
            rel="apple-touch-icon"
            sizes="72x72"
            href="http://placehold.it/72.png/000/fff"
        />
        <!-- Standard iPhone Touch Icon-->
        <link
            rel="apple-touch-icon"
            sizes="57x57"
            href="http://placehold.it/57.png/000/fff"
        />
        <!-- Styles -->

        <link
            href="{{
                asset('assets/css/lib/calendar2/pignose.calendar.min.css')
            }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/chartist/chartist.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/font-awesome.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/themify-icons.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/owl.carousel.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/owl.theme.default.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/weather-icons.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/menubar/sidebar.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/bootstrap.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/lib/helper.css') }}"
            rel="stylesheet"
        />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        @livewireStyles
    </head>
    <body>
        <div
            class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures"
        >
            <div class="nano">
                <div class="nano-content">
                    <ul>
                        <div class="logo">
                            <a href="{{ route('homepage.index') }}">
                                <img
                                    src="{{ asset('/images/power white.png') }}"
                                    width="120"
                                    height="100"
                                    alt=""
                            /></a>
                        </div>
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                ><i class="ti-home"></i> Dashboard</a
                            >
                        </li>
                        @if(Route::has('login')) @auth
                        @if(Auth::user()->utype==='Editor' ||
                        Auth::user()->utype==='Admin' ||
                        Auth::user()->utype==='User')
                        <li>
                            <a href="{{ route('profile.show') }}"
                                ><i class="fa fa-user"></i>Profile</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('admin.page.list') }}"
                                ><i class="fa fa-columns"></i>Pages</a
                            >
                        </li>
                        @endif @if(Auth::user()->utype==='Admin')
                        <li>
                            <a href="{{ route('users.dashboard') }}"
                                ><i class="fa fa-users"></i> Users</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('admin.team.list') }}"
                                ><i class="fa fa-user-plus"></i> Company team</a
                            >
                        </li>
                        @endif @if(Auth::user()->utype==='Editor' ||
                        Auth::user()->utype==='Admin')
                        <li>
                            <a href="{{ route('admin.job') }}"
                                ><i class="ti-bag"></i>Job Postings</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('admin.blogs') }}"
                                ><i class="ti-file"></i> Latest</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('admin.event.list') }}"
                                ><i class="ti-calendar"></i> Events</a
                            >
                        </li>

                        <li>
                            <a href="{{ route('admin.petition.list') }}"
                                ><i class="ti-list"></i> Petition</a
                            >
                        </li>

                        <li>
                            <a href="{{ route('admin.media.list') }}"
                                ><i class="ti-bookmark"></i> Media</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('admin.album.list') }}"
                                ><i class="ti-folder"></i> Gallery</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('admin.publications') }}"
                                ><i class="ti-bookmark"></i> Our Work</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('testimonials.index') }}"
                                ><i class="ti-bookmark"></i> Testimonials</a
                            >
                        </li>

                        @endif @if(Auth::user()->utype==='Editor' ||
                        Auth::user()->utype==='Admin' ||
                        Auth::user()->utype==='User')
                        <li>
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                ><i class="ti-close"></i> Logout</a
                            >
                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                            >
                                @csrf
                            </form>
                        </li>
                        @endif @endauth @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="dropdown dib">
                                <div class="header-icon" data-toggle="dropdown">
                                    <span class="user-avatar"
                                        >{{Auth::user()->name}}
                                        <i class="ti-angle-down f-s-10"></i>
                                    </span>
                                    <div
                                        class="drop-down dropdown-profile dropdown-menu dropdown-menu-right"
                                    >
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a
                                                        href="{{
                                                            route('logout')
                                                        }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                        class="ti-power-off"
                                                    >
                                                        <span>Logout</span>
                                                    </a>

                                                    <form
                                                        id="logout-form"
                                                        action="{{
                                                            route('logout')
                                                        }}"
                                                        method="POST"
                                                        style="display: none"
                                                    >
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content') @if( isset($slot) ) {{ $slot }} @endif
        <!-- jquery vendor -->
        <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
        <script src="{{
                asset('assets/js/lib/jquery.nanoscroller.min.js')
            }}"></script>
        <!-- nano scroller -->
        <script src="{{ asset('assets/js/lib/menubar/sidebar.js') }}"></script>
        <script src="{{
                asset('assets/js/lib/preloader/pace.min.js')
            }}"></script>
        <!-- sidebar -->

        <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <!-- bootstrap -->

        <script src="{{
                asset('assets/js/lib/calendar-2/moment.latest.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/calendar-2/pignose.calendar.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/calendar-2/pignose.init.js')
            }}"></script>

        <script src="{{
                asset('assets/js/lib/weather/jquery.simpleWeather.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/weather/weather-init.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/circle-progress/circle-progress.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/circle-progress/circle-progress-init.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/chartist/chartist.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/sparklinechart/sparkline.init.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/owl-carousel/owl.carousel.min.js')
            }}"></script>
        <script src="{{
                asset('assets/js/lib/owl-carousel/owl.carousel-init.js')
            }}"></script>

        @livewireScripts
    </body>
</html>
