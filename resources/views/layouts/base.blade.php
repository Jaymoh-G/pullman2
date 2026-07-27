<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Pullman Construction and Equipment Hiring</title>

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="{{ asset('apple-touch-icon.png') }}"
        />

        <link
            href="{{ asset('assets/css/lib/calendar2/pignose.calendar.min.css') }}"
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
        <link href="{{ asset('assets/css/admin-shell.css') }}?v=1" rel="stylesheet" />
        @livewireStyles
    </head>
    <body class="admin-shell">
        <div class="admin-sidebar-overlay" id="admin-sidebar-overlay" aria-hidden="true"></div>

        <div class="sidebar" id="admin-sidebar">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                        <div class="logo">
                            <a href="{{ route('homepage.index') }}">
                                <img
                                    src="{{ asset('images/logo_pullman_header.png') }}"
                                    alt="Pullman Construction"
                                />
                            </a>
                        </div>
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                ><i class="ti-home"></i> Dashboard</a
                            >
                        </li>
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->utype === 'Editor' || Auth::user()->utype === 'Admin' || Auth::user()->utype === 'User')
                                    <li>
                                        <a href="{{ route('profile.show') }}"
                                            ><i class="fa fa-user"></i> Profile</a
                                        >
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.page.list') }}"
                                            ><i class="fa fa-columns"></i> Pages</a
                                        >
                                    </li>
                                @endif
                                @if (Auth::user()->utype === 'Admin')
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
                                @endif
                                @if (Auth::user()->utype === 'Editor' || Auth::user()->utype === 'Admin')
                                    <li>
                                        <a href="{{ route('admin.job') }}"
                                            ><i class="ti-bag"></i> Job Postings</a
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
                                @endif
                                @if (Auth::user()->utype === 'Editor' || Auth::user()->utype === 'Admin' || Auth::user()->utype === 'User')
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
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div
                            class="hamburger sidebar-toggle"
                            id="admin-sidebar-toggle"
                            role="button"
                            tabindex="0"
                            aria-label="Toggle menu"
                        >
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        @auth
                            <span class="user-avatar">{{ Auth::user()->name }}</span>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
        @if (isset($slot))
            {{ $slot }}
        @endif

        <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/lib/calendar-2/moment.latest.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/calendar-2/pignose.init.js') }}"></script>
        <script src="{{ asset('assets/js/lib/chartist/chartist.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/sparklinechart/sparkline.init.js') }}"></script>
        <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
        <script>
            (function () {
                const sidebar = document.getElementById('admin-sidebar');
                const overlay = document.getElementById('admin-sidebar-overlay');
                const toggle = document.getElementById('admin-sidebar-toggle');

                const isDesktop = () => window.matchMedia('(min-width: 992px)').matches;

                const openMobile = () => {
                    sidebar.classList.add('is-open');
                    overlay.classList.add('is-open');
                    overlay.setAttribute('aria-hidden', 'false');
                };

                const closeMobile = () => {
                    sidebar.classList.remove('is-open');
                    overlay.classList.remove('is-open');
                    overlay.setAttribute('aria-hidden', 'true');
                };

                const onToggle = () => {
                    if (isDesktop()) {
                        document.body.classList.toggle('admin-sidebar-collapsed');
                        return;
                    }
                    if (sidebar.classList.contains('is-open')) {
                        closeMobile();
                    } else {
                        openMobile();
                    }
                };

                if (toggle) {
                    toggle.addEventListener('click', onToggle);
                    toggle.addEventListener('keydown', function (e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            onToggle();
                        }
                    });
                }
                if (overlay) {
                    overlay.addEventListener('click', closeMobile);
                }

                document.querySelectorAll('#admin-sidebar a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        if (!isDesktop()) {
                            closeMobile();
                        }
                    });
                });
            })();
        </script>
        @livewireScripts
    </body>
</html>
