<!DOCTYPE html>
<html lang="en">

<head>
    <title>Travelz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')
    <!--- Style css -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

    <!--- Style css -->
    @if (App::getLocale() == 'en')
        <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    @endif

    <style>
        .text-gradient:hover {
            background: linear-gradient(to bottom, #00000061 0%, #000fff00 40%)
        }


        svg {
            width: 20px;
        }

        .flex {
            display: flex
        }

        .items-center {
            justify-content: space-between;

        }

        .justify-between {
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="">Travelz<span>Travel Agency</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">


                    <div class="btn-group mb-1 nav-item cta">
                        <button type="button" class="btn btn-sm text-primary nav-item dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (App::getLocale() == 'ar')
                                {{ LaravelLocalization::getCurrentLocaleName() }}
                                <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                            @else
                                {{ LaravelLocalization::getCurrentLocaleName() }}
                                <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                            @endif
                        </button>
                        <div class="dropdown-menu">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}"><a
                            href="{{ route('welcome') }}" class="nav-link">{{ trans('blog.Home') }}</a></li>
                    <li class="nav-item {{ request()->routeIs('packages.*') ? 'active' : '' }}"><a
                            href="{{ route('packages.index') }}" class="nav-link">{{ trans('blog.Destination') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('news.*') ? 'active' : '' }}"><a
                            href="{{ route('news.index') }}" class="nav-link">{{ trans('blog.Blog') }}</a></li>
                    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a
                            href="{{ route('about') }}" class="nav-link">{{ trans('blog.About') }}</a></li>
                    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a
                            href="{{ route('contact') }}" class="nav-link">{{ trans('blog.Contact') }}</a></li>
                    @if (Auth::user())
                        <li class="nav-item cta">
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-link nav-link"
                                    style="font-size: 15px; padding-top: 1.5rem; padding-bottom: 1.5rem; padding-left: 20px; padding-right: 20px; color: #fff; font-weight: 400; opacity: 1 !important; background-color:transparent; border:0px;cursur:pointer">{{ trans('blog.logout') }}</button>

                            </form>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a
                                    href="{{ route('home') }}" class="nav-link">{{ trans('blog.dashboard') }}</a></li>
                        @endif
                    @else
                        <li class="nav-item cta"><a href="{{ route('login') }}"
                                class="nav-link">{{ trans('blog.login') }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('page')
    <footer class="ftco-footer bg-bottom" style="background-image: url(images/footer-bg.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Safari</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Categories</h2>
                        @foreach ($categories as $category)
                            <div class="col-6">
                                <a href="#">
                                    {{ $category->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Tags</h2>
                        @foreach ($tags as $tag)
                            <div class="col-6">
                                <a href="#">
                                    {{ $tag->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have any Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Ole Sangale Road,
                                        off
                                        Langata Road, in Madaraka Estate, Nairobi, Kenya.</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">+254712345678</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
