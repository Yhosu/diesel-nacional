<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', config('capyei.description'))">
    <meta name="keywords" content="@yield('keywords', config('capyei.keywords'))">
    <meta name="author" content="{{ config('app.author') }}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preload" as="image" href="{{ assets('assets/templates/master/dark/images/bg/brush-dec.webp') }}" fetchpriority="high" />
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/dark-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/color.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/extra/extra.css') }}">
    
    
    <meta property="og:image" content="https://dieselnacional.pub/assets/img/content/Foto-para-banner.webp"/>
    @stack('prehead')

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([
            // Custom
            'resources/scss/main.scss',
            'resources/js/main.js',
        ])
    @endif

    @stack('head')
</head>
<body class="cy-web">
    <!-- lodaer  -->
    <div class="loader-wrap">
        <div class="loader-item">
            <div class="cd-loader-layer" data-frame="25">
                <div class="loader-layer"></div>
            </div>
            <span class="loader"></span>
        </div>
    </div>
    <!-- loader end  -->

    <!-- main start  -->
    <div id="main">
        <!-- header  -->
        <header class="main-header">
            <!-- header-top  -->
            <div class="header-top">
                <div class="container_tmp">
                    <div class="lang-wrap">
                        <a href="{{ route('language', ['lang' => 'en']) }}" class="{{ \App::getLocale() == 'en' ? 'act-lang' : '' }} font-courier_new">EN</a>
                        <span>/</span>
                        <a href="{{ route('language', ['lang' => 'es']) }}" class="{{ \App::getLocale() == 'es' ? 'act-lang' : '' }} font-courier_new">ES</a>
                    </div>
                    <div class="header-top_contacts"><a href="#" class="font-courier_new"><span>{{ $phone->key }}:</span> +{{ $phone->value }}</a><a href="#" class="font-courier_new"><span>{{ $email->key }}:</span> {{ $email->value }}</a></div>
                </div>
            </div>
            <!--header-top end -->
            <!-- header-inner -->
            <div class="header-inner  fl-wrap">
                <div class="container_tmp">
                    <div class="header-container fl-wrap">
                        <a href="{{ url('') }}" class="logo-holder"><img src="{{ asset('assets/img/logo-complete-horizontal-gold.svg') }}" alt="{{ config('name') }}"></a>
                        <div class="show-share-btn showshare htact" style="margin-left: 24px;"><i class="fal fa-bullhorn"></i> <span class="header-tooltip">Compartir</span></div>
                        <!-- nav-button-wrap-->
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <!-- nav-button-wrap end-->
                        <!--  navigation -->
                        <div class="nav-holder main-menu">
                            <nav class="scroll-init">
                                <ul>
                                    <!-- Normal pages routes -->
                                    <!-- Onepage routes -->
                                    <li><a href="{{ url('home#sec1') }}" class="act-scrlink header__menu">{{ __('diesel.menu.home') }}</a></li>
                                    <li><a href="{{ url('home#sec2') }}" class="header__menu">{{ __('diesel.menu.about') }}</a></li>
                                    <li><a href="{{ url('home#sec3') }}" class="header__menu">{{ __('diesel.menu.menu') }}</a></li>
                                    <li><a href="{{ url('home#sec4') }}" class="header__menu">{{ __('diesel.menu.gallery') }}</a></li>
                                    <li><a href="{{ url('home#sec5') }}" class="header__menu">{{ __('diesel.menu.comments') }}</a></li>
                                    <li><a href="{{ url('home#sec6') }}" class="header__menu">{{ __('diesel.menu.contact') }}</a></li>
                                    <li><a href="#sectionForm">{{ __('diesel.menu.reservations') }}</a></li>
                                    <li class="lang-wrap mobile__element" style="display: none">
                                        <p>
                                            <a style="width: auto; display:inline-block; float: none;" onclick="location.href='{{ url('change-locale/en') }}';" class="{{ \App::getLocale() == 'en' ? 'act-lang' : '' }} header__locale">EN</a>
                                            <span style="width: auto; display:inline-block;">/</span>
                                            <a style="width: auto; display:inline-block; float: none;" onclick="location.href='{{ url('change-locale/es') }}';" class="{{ \App::getLocale() == 'es' ? 'act-lang' : '' }} header__locale">ES</a>
                                        </p>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- navigation  end -->                        
                        <!-- share-wrapper -->
                        <div class="share-wrapper isShare">
                            <div class="share-container fl-wrap"></div>
                        </div>
                        <!-- share-wrapper-end -->
                    </div>
                </div>
            </div>
            <!-- header-inner end  -->
        </header>
        <!--header end -->	

        <!-- wrapper  -->	
        <div id="wrapper">
            {{ $slot }}

            <div class="height-emulator fl-wrap"></div>

            <footer class="fl-wrap dark-bg fixed-footer">
                <div class="container_tmp">
                    <div class="footer-top fl-wrap">
                        <a href="{{ url('') }}" class="footer-logo"><img src="{{ asset('assets/img/logo-gold.svg') }}" alt="{{ config('name') }}"></a>
                        <div class="lang-wrap"><a href="{{ route('language', ['lang' => 'en']) }}" class="{{ \App::getLocale() == 'en' ? 'act-lang' : '' }}">EN</a><span>/</span><a href="{{ route('language', ['lang' => 'es']) }}" class="{{ \App::getLocale() == 'es' ? 'act-lang' : '' }}">ES</a></div>
                        <div class="footer-social">
                            <span class="footer-social-title font-courier_new">{{ __('diesel.follow_us_on') }}:</span>
                            <ul>
                                @foreach( $socialNetworks as $socialNetwork )
                                    <li><a href="{{ $socialNetwork->url }}" target="_blank"><i class="{{ $socialNetwork->icon }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- footer-widget-wrap -->
                    <div class="footer-widget-wrap fl-wrap">
                        <div class="row">
                            <!-- footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <div class="footer-widget-title font-courier_new">{{ __('diesel.about') }}</div>
                                    <div class="footer-widget-content">
                                        <p>{{ $description->value }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget  end-->
                            <!-- footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <div class="footer-widget-title font-courier_new">{{ __('diesel.contact_title') }}</div>
                                    <div class="footer-widget-content">
                                        <div class="footer-contacts footer-box fl-wrap">
                                            <ul>
                                                <li><span>{{ $phone->key }}:</span><a href="#">+{{ $phone->value }}</a></li>
                                                <li><span>{{ $email->key }}:</span><a href="#">{{ $email->value }}</a></li>
                                                <li><span>{{ $address->key }}: </span><a href="#">{{ $address->value }}</a></li>
                                            </ul>
                                        </div>
                                        {{-- <a href="contacts.html" class="footer-widget-content-link">Contáctanos</a>                                                    	 --}}
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget  end-->
                            <!-- footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <div class="footer-widget-title font-courier_new">{{ __('diesel.subscribe_title') }}</div>
                                    <div class="footer-widget-content">
                                        <div class="subcribe-form fl-wrap">
                                            <p>{{ __('diesel.suscribe') }}</p>
                                            <form id="subscribe" class="fl-wrap">
                                                <input class="enteremail" name="email" id="subscribe-email" placeholder="Email" spellcheck="false" type="text">
                                                <button type="submit" id="subscribe-button" class="subscribe-button color-bg font-courier_new">{{ __('diesel.btn_send_title')}} </button>
                                                <label for="subscribe-email" class="subscribe-message"></label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget  end-->
                        </div>
                    </div>
                    <!-- footer-widget-wrap end-->
                    <div class="footer-bottom fl-wrap">
                        <div class="copyright font-courier_new">&#169; Diesel Nacional 2025 - All Rights Reserved.</div>
                        <div class="to-top"><span class="font-courier_new">{{ __('diesel.back_to_top') }} </span><i class="fal fa-angle-double-up"></i></div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- wrapper end -->
    </div>
    <!-- cursor-->
    <div class="element">
        <div class="element-item"></div>
    </div>
    <!-- cursor end-->   

    <!-- whatsapp-->
    <div class="whatsapp__btn-content">
        <a href="https://api.whatsapp.com/send?phone=59169002412&text=Hola que tal..." target="_blank" class="whatsapp__btn">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <!-- whatsapp end-->   
    <!--=============== scripts  ===============-->
    <script src="{{ asset('assets/templates/master/dark/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/templates/master/dark/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/templates/master/dark/js/scripts.js') }}"></script>
    <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>
    <script>
        function onScrollEvent(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var attributes = entry.target.attributes;
                    var src = attributes['data-src'].textContent;
                    entry.target.src = src;
                    entry.target.classList.add('visible');
                }
            });
        }
        var targets = document.querySelectorAll('.lazyLoad');
        var observer = new IntersectionObserver(onScrollEvent);
        targets.forEach(function(entry) {
            observer.observe(entry);
        });        
    </script>
    @stack('scripts')
</body>
</html>