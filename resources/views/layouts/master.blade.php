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

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/dark-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/master/dark/css/color.css') }}">

    @stack('prehead')

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([
            // Custom
            'resources/css/app.css',
            'resources/scss/main.scss',
            'resources/js/main.js',
            'resources/js/master/main.js',
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
                        <a href="{{ route('language', ['lang' => 'en']) }}" class="{{ \App::getLocale() == 'en' ? 'act-lang' : '' }}">En</a>
                        <span>/</span>
                        <a href="{{ route('language', ['lang' => 'es']) }}" class="{{ \App::getLocale() == 'es' ? 'act-lang' : '' }}">Es</a>
                    </div>
                    <div class="header-top_contacts"><a href="#"><span>{{ __('diesel.cellphone') }}:</span> +5917777777</a><a href="#"><span>{{ __('diesel.email') }}:</span> inbox@dieselnacional.com</a></div>
                </div>
            </div>
            <!--header-top end -->
            <!-- header-inner -->
            <div class="header-inner  fl-wrap">
                <div class="container_tmp">
                    <div class="header-container fl-wrap">
                        <a href="{{ url('') }}" class="logo-holder"><img src="{{ asset('assets/img/logo-text-white.svg') }}" alt="{{ config('name') }}"></a>
                        <div class="show-share-btn showshare htact"><i class="fal fa-bullhorn"></i> <span class="header-tooltip">Compartir</span></div>
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
                                    {{-- <li>
                                        <a href="{{ url('home') }}" class="{{ request()->is('home') ? 'act-link' : '' }}">Inicio </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('menu') }}" class="{{ request()->is('menu') ? 'act-link' : '' }}">Menú</a>
                                    </li>
                                    <li><a href="{{ url('about-us') }}" class="{{ request()->is('about-us') ? 'act-link' : '' }}">Nosotros</a></li>
                                    <li><a href="{{ url('contact') }}" class="{{ request()->is('contact') ? 'act-link' : '' }}">Contacto</a></li>
                                    <li><a href="{{ url('blog') }}" class="{{ request()->is('blog') ? 'act-link' : '' }}">Noticias</a></li> --}}

                                    <!-- Onepage routes -->
                                    <li><a href="#sec1" class="act-scrlink">{{ __('diesel.menu.home') }}</a></li>
                                    <li><a href="#sec2">{{ __('diesel.menu.about') }}</a></li>
                                    <li><a href="#sec3">{{ __('diesel.menu.menu') }}</a></li>
                                    <li><a href="#sec4">{{ __('diesel.menu.gallery') }}</a></li>
                                    <li><a href="#sec5">{{ __('diesel.menu.comments') }}</a></li>
                                    <li><a href="#sec6">{{ __('diesel.menu.contact') }}</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- navigation  end -->                        
                        <!-- header-cart_wrap  -->
                        <div class="header-cart_wrap novis_cart">
                            <div class="header-cart_title">Tu Carrito <span>4 items</span></div>
                            <div class="header-cart_wrap_container fl-wrap">
                                <div class="box-widget-content">
                                    <div class="widget-posts fl-wrap">
                                        <ol>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="https://restabook.kwst.net/dark/images/menu/1.jpg" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Grilled Steaks</a>
                                                    <div class="widget-posts-descr_calc clearfix">1 <span>x</span> $45</div>
                                                </div>
                                                <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="https://restabook.kwst.net/dark/images/menu/2.jpg" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Cripsy Lobster & Shrimp Bites</a>
                                                    <div class="widget-posts-descr_calc clearfix">2 <span>x</span> $22</div>
                                                </div>
                                                <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="https://restabook.kwst.net/dark/images/menu/3.jpg" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Chicken tortilla soup</a>
                                                    <div class="widget-posts-descr_calc clearfix">1 <span>x</span> $37</div>
                                                </div>
                                                <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="header-cart_wrap_total fl-wrap">
                                <div class="header-cart_wrap_total_item">Subtotal : <span>$147</span></div>
                            </div>
                            <div class="header-cart_wrap_footer fl-wrap">
                                <a href="cart.html"> View Cart</a>
                                <a href="checkout.html">  Checkout</a>
                            </div>
                        </div>
                        <!-- header-cart_wrap end  -->
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
                        <a href="{{ url('') }}" class="footer-logo"><img src="{{ asset('assets/img/logo-white.svg') }}" alt="{{ config('name') }}"></a>
                        <div class="lang-wrap"><a href="{{ route('language', ['lang' => 'en']) }}" class="{{ \App::getLocale() == 'en' ? 'act-lang' : '' }}">En</a><span>/</span><a href="{{ route('language', ['lang' => 'es']) }}" class="{{ \App::getLocale() == 'es' ? 'act-lang' : '' }}">Es</a></div>
                        <div class="footer-social">
                            <span class="footer-social-title">{{ __('diesel.follow_us_on') }}:</span>
                            <ul>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- footer-widget-wrap -->
                    <div class="footer-widget-wrap fl-wrap">
                        <div class="row">
                            <!-- footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <div class="footer-widget-title">{{ __('diesel.about') }}</div>
                                    <div class="footer-widget-content">
                                        <p>{{ __('diesel.about_us_description') }}</p>
                                        {{-- <a href="{{ url('about') }}" class="footer-widget-content-link">Read more</a>                                                    	 --}}
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget  end-->
                            <!-- footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <div class="footer-widget-title">{{ __('diesel.contact_title') }}</div>
                                    <div class="footer-widget-content">
                                        <div class="footer-contacts footer-box fl-wrap">
                                            <ul>
                                                <li><span>{{ __('diesel.cellphone') }}:</span><a href="#">+5917777777</a></li>
                                                <li><span>{{ __('diesel.email') }}:</span><a href="#">inbox@dieselnacional.com</a></li>
                                                <li><span>{{ __('diesel.locate_us') }}: </span><a href="#">20 de Octubre Ave # 2271, La Paz, Bolivia</a></li>
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
                                    <div class="footer-widget-title">{{ __('diesel.subscribe_title') }}</div>
                                    <div class="footer-widget-content">
                                        <div class="subcribe-form fl-wrap">
                                            <p>{{ __('diesel.suscribe') }}</p>
                                            <form id="subscribe" class="fl-wrap">
                                                <input class="enteremail" name="email" id="subscribe-email" placeholder="{{ __('diesel.email') }}" spellcheck="false" type="text">
                                                <button type="submit" id="subscribe-button" class="subscribe-button color-bg">{{ __('diesel.btn_send_title')}} </button>
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
                        <div class="copyright">&#169; Diesel Nacional 2025 - All Rights Reserved.</div>
                        <div class="to-top"><span>{{ __('diesel.back_to_top') }} </span><i class="fal fa-angle-double-up"></i></div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- wrapper end -->
        <!-- reservation-modal-wrap-->          
        <div class="reservation-modal-wrap">
            <div class="reserv-overlay crm">
                <div class="cd-reserv-overlay-layer" data-frame="25">
                    <div class="reserv-overlay-layer"></div>
                </div>
            </div>
            <div class="reservation-modal-container bot-element">
                <div class="reservation-modal-item fl-wrap">
                    <div class="close-reservation-modal crm"><i class="fal fa-times"></i></div>
                    <div class="reservation-bg"></div>
                    <div class="section-title">
                        <h4>Don't forget to book a table</h4>
                        <h2>Table Reservations</h2>
                        <div class="dots-separator fl-wrap"><span></span></div>
                    </div>
                    <div class="reservation-wrap">
                        <div id="reserv-message"></div>
                        <form  class="custom-form" action="php/reservation.php" name="reservationform" id="reservationform">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  name="email" id="email" placeholder="Email Address *" value=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  name="phone" id="phone" placeholder="Phone *" value=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="fl-wrap">
                                            <select name="numperson" id="persons" data-placeholder="Persons" class="chosen-select no-search-select">
                                                <option data-display="Persons">Any</option>
                                                <option value="1">1 Person</option>
                                                <option value="2">2 People</option>
                                                <option value="3">3 People</option>
                                                <option value="4">4 People</option>
                                                <option value="5">5 People</option>
                                                <option value="Banquet">Banquet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-6">
                                        <div class="date-container2 fl-wrap">
                                            <input type="text" placeholder="Date" id="res_date"     name="resdate"   value=""/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="fl-wrap">
                                            <select name="restime" id="resrv-time" data-placeholder="Time" class="chosen-select no-search-select">
                                                <option data-display="Time">Any</option>
                                                <option value="10:00am">10:00 am</option>
                                                <option value="11:00am">11:00 am</option>
                                                <option value="12:00pm">12:00 pm</option>
                                                <option value="1:00pm">1:00 pm</option>
                                                <option value="2:00pm">2:00 pm</option>
                                                <option value="3:00pm">3:00 pm</option>
                                                <option value="4:00pm">4:00 pm</option>
                                                <option value="5:00pm">5:00 pm</option>
                                                <option value="6:00pm">6:00 pm</option>
                                                <option value="7:00pm">7:00 pm</option>
                                                <option value="8:00pm">8:00 pm</option>
                                                <option value="9:00pm">9:00 pm</option>
                                                <option value="10:00pm">10:00 pm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <textarea name="comments"  id="comments" cols="30" rows="3" placeholder="Your Message:"></textarea>
                                <div class="clearfix"></div>
                                <button class="btn color-bg" id="reservation-submit">Reserve Table  <i class="fal fa-long-arrow-right"></i></button>
                            </fieldset>
                        </form>
                    </div>
                    <!-- reservation-wrap end-->
                </div>
            </div>
        </div>
    </div>
    <!-- reservation-modal-wrap end-->     
    <!-- cursor-->
    <div class="element">
        <div class="element-item"></div>
    </div>
    <!-- cursor end-->   

    <!--=============== scripts  ===============-->
    <script src="{{ asset('assets/templates/master/dark/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/templates/master/dark/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/templates/master/dark/js/scripts.js') }}"></script>

    @stack('scripts')
</body>
</html>