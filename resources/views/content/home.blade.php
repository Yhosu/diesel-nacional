<x-master-layout>
    <!-- hero-wrap-->
    <div class="hero-wrap fl-wrap full-height" data-scrollax-parent="true" id="sec1">
        <div class="bg par-elem "  data-bg="https://restabook.kwst.net/dark/images/bg/2.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="hero-title-wrap fl-wrap">
            <div class="container_tmp">
                <div class="hero-title">
                    <h4>{{ $bannerInit->subtitle }} </h4>
                    <h2>{{ $bannerInit->title }}</h2>
                    <a href="#sec3" class="hero_btn custom-scroll-link">{{ __('diesel.check_menu') }} <i class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!--hero_promo-wrap-->
        <div class="hero_promo-wrap bot-element2">
            <div class="hero_promo-button">
                <a href="https://vimeo.com/10322316" class="image-popup"><i class="fas fa-play"></i></a>
            </div>
            <div class="hero_promo-title">
                <h4>{{ __('diesel.promo_video') }}</h4>
            </div>
        </div>
        <!--hero_promo-wrap end-->
        <!--hero-social-->
        <div class="hero-social">
            <ul>
                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
            </ul>
        </div>
        <!--hero-social end-->
        <!-- hero-bottom-container -->
        <div class="hero-bottom-container">
            <div class="container_tmp">
                <div class="scroll-down-wrap">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                    <span>{{ __('diesel.scroll_title') }}</span>
                </div>
                <a href="#sec2" class="sd_btn custom-scroll-link"><i class="fal fa-chevron-double-down"></i></a>
            </div>
        </div>
        <!-- hero-bottom-container -->
        <div class="hero-dec_top"></div>
        <div class="hero-dec_bottom"></div>
        <div class="brush-dec"></div>
    </div>
    <!-- hero-wrap  end -->
    @if (Session::has('message_success'))
        <div class="section-title text-align_center">
            <h2>{{ Session::get('message_success') }}</h2>
        </div>
    @elseif(Session::has('message_error'))
        <div class="section-title text-align_center">
            <h2>{{ Session::get('message_error') }}</h2>
        </div>
    @endif
    <!-- content  -->
    <div class="content">
        <section class="hidden-section big-padding" data-scrollax-parent="true" id="sec2">
            <div class="container_tmp">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title text-align_left">
                            <h4>{{ __('diesel.our_story') }}</h4>
                            <h2>{{ $about->title }}</h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <div class="text-block ">
                            {!! $about->description !!}
                            {{-- <a href="{{ route('menu') }}" class="btn fl-btn custom-scroll-link">{{ __('diesel.check_menu_2') }}<i class="fal fa-long-arrow-right"></i></a> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-collge-wrap fl-wrap">
                            <div class="main-iamge">
                                <img src="{{ \Asset::get_image_path('about-image_1', 'normal', $about->image_1) }}"   alt="">
                            </div>
                            <div class="images-collage-item" style="width:65%" data-position-left="68" data-position-top="-15" data-zindex="2" data-opacity="1.0">
                                <img src="{{ \Asset::get_image_path('about-image_2', 'normal', $about->image_2) }}" alt="">
                            </div>
                            <div class="images-collage-item col_par" style="width:120px" data-position-left="-23" data-position-top="-17" data-zindex="9" data-scrollax="properties: { translateY: '150px' }"><img src="https://restabook.kwst.net/dark/images/cube.png" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="section-dec sec-dec_top"></div>
                <div class="wave-bg" data-scrollax="properties: { translateY: '-150px' }"></div>
            </div>
        </section>
        <!--  section end  -->

        <!-- section   -->
        <section class="column-section no-padding hidden-section" data-scrollax-parent="true">
            <div class="column-wrap-bg left-wrap">
                <div class="bg par-elem "  data-bg="https://restabook.kwst.net/dark/images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="quote-box">
                    <i class="fal fa-quote-right"></i>
                    <p>"{{ $scheduleText }}"</p>
                    {{-- <div class="signature"><img src="https://restabook.kwst.net/dark/images/signature.png" alt=""></div> --}}
                    <h4>{{ $scheduleTextSecondary }}</h4>
                </div>
            </div>
            <div class="column-section-wrap dark-bg" >
                <div class="container_tmp"  >
                    <div class="column-text">
                        <div class="section-title">
                            <h4>{{ __('diesel.call_for_reservations') }}</h4>
                            <h2>{{ __('diesel.opening_hours') }}</h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <div class="work-time fl-wrap">
                            <div class="row">
                                @foreach ($schedules as $schedule)
                                <div class="col-md-6">
                                    <h3>{{ $schedule->title }}</h3>
                                    <div class="hours">
                                        {{ $schedule->from }}<br>
                                        {{ $schedule->to }}
                                    </div>
                                </div>    
                                @endforeach
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="bold-separator"><span></span></div>
                        <div class="big-number"><a href="#">+{{ $phone->value }}</a></div>
                    </div>
                </div>
                <div class="illustration_bg">
                    <div class="bg"  data-bg="https://restabook.kwst.net/dark/images/bg/dec/7.png"></div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--  section    -->
        {{-- <section data-scrollax-parent="true">
            <div class="container_tmp">
                <div class="section-title">
                    <h4>Our awesome team</h4>
                    <h2>Met Our Chefs</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
                <div class="about-wrap  fl-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- team-item -->
                            <div class="team-box">
                                <div class="team-photo">
                                    <img src="https://restabook.kwst.net/dark/images/team/1.jpg" alt="" class="respimg">
                                    <div class="overlay"></div>
                                    <div class="team-social">
                                        <span class="ts_title">Follow</span>
                                        <ul class="no-list-style">
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-info fl-wrap">
                                    <h3> Kevin  Gray </h3>
                                    <h4>Master chef in New York</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                </div>
                            </div>
                        </div>
                        <!-- team-item  end-->
                        <!-- team-item -->
                        <div class="col-md-4">
                            <div class="team-box">
                                <div class="team-photo">
                                    <img src="https://restabook.kwst.net/dark/images/team/2.jpg" alt="" class="respimg">
                                    <div class="overlay"></div>
                                    <div class="team-social">
                                        <span class="ts_title">Follow</span>
                                        <ul class="no-list-style">
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-info fl-wrap">
                                    <h3> Austin Evon </h3>
                                    <h4>Master chef in Florida</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                </div>
                            </div>
                        </div>
                        <!-- team-item end  -->
                        <!-- team-item -->
                        <div class="col-md-4">
                            <div class="team-box">
                                <div class="team-photo">
                                    <img src="https://restabook.kwst.net/dark/images/team/3.jpg" alt="" class="respimg">
                                    <div class="overlay"></div>
                                    <div class="team-social">
                                        <span class="ts_title">Follow</span>
                                        <ul class="no-list-style">
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-info fl-wrap">
                                    <h3> Taylor Roberts </h3>
                                    <h4>Master chef in Maiami</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                </div>
                            </div>
                        </div>
                        <!-- team-item end  -->
                        <div class="col-md-8">
                            <div class="align-text-block">
                                <h4>Want to cook something tasty? Read our best recipes.</h4>
                                <a href="blog.html" class="btn">Recipes Book <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="section-dec sec-dec_top"></div>
                </div>
                <div class="wave-bg wave-bg_right " data-scrollax="properties: { translateY: '-150px' }"></div>
            </div>
        </section> --}}
        <!--  section end  -->
        <!--  section  -->
        <section class="parallax-section dark-bg hidden-section" data-scrollax-parent="true" id="sec3">
            <div class="brush-dec2"></div>
            <div class="brush-dec"></div>
            <div class="bg par-elem bg_tabs"  data-bg="https://restabook.kwst.net/dark/images/bg/4.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="cd-tabs-layer" data-frame="10">
                <div class="tabs-layer"></div>
            </div>
            <div class="overlay op7"></div>
            <div class="container_tmp">
                <div class="section-title">
                    <h4>{{ __('diesel.special_menu_offers') }}</h4>
                    <h2>{{ __('diesel.discover_our_menu') }}</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
                <!--  hero-menu_header  end-->
                <div class="hero-menu tabs-act fl-wrap">
                    <div class="row">
                        <!--  hero-menu_header-->
                        <div class="col-md-3">
                            <div class="hero-menu_header fl-wrap">
                                <ul class="tabs-menu no-list-style change_bg">
                                    @foreach( $menus as $key => $menu )
                                    <li class="{{ $key == 0 ? 'current' : ''}}"><a href="#tab-{{ $key + 1}}" data-bgtab="https://restabook.kwst.net/dark/images/bg/{{ rand(4,9)}}.jpg"><span>0{{ $key + 1 }}.</span>{{ $menu->title }}</a></li>
                                    @endforeach
                                </ul>
                                <br>
                                <ul>
                                    <li class=""><a href="#sec4"><span>07.</span>{{ __('diesel.show_gallery')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--  hero-menu_header  end-->
                        <!--  hero-menu_content   -->
                        <div class="col-md-9">
                            <div class="hero-menu_content fl-wrap">
                                <div class="tabs-container">
                                    <div class="tab">
                                        @foreach ($menus as $key => $menu)
                                            @if( $key == 0 )
                                            <div id="tab-1" class="tab-content first-tab">
                                                @foreach( $menu->menu_items as $key2=>$menu_item )
                                                <div class="hero-menu-item">
                                                    <div class="hero-menu-item-title fl-wrap">
                                                        <h6><span>0{{ $key2 + 1 }}.</span>{{ $menu_item->title }}</h6>
                                                        <div class="hmi-dec"></div>
                                                        <span class="hero-menu-item-price">Bs. {{$menu_item->price}}</span>
                                                    </div>
                                                    <div class="hero-menu-item-details">
                                                        <p>{{ $menu_item->detail }}</p>
                                                    </div>
                                                </div>
                                                @endforeach                                                
                                            </div>
                                            @else 
                                            <div class="tab">
                                                <div id="tab-{{ $key + 1 }}" class="tab-content">
                                                    <!-- header-menu-item-->
                                                    @foreach( $menu->menu_items as $key2 => $menu_item )
                                                    <div class="hero-menu-item">
                                                        <div class="hero-menu-item-title fl-wrap">
                                                            <h6><span>0{{ $key2 + 1 }}.</span>{{ $menu_item->title }}</h6>
                                                            <div class="hmi-dec"></div>
                                                            <span class="hero-menu-item-price">${{ $menu_item->price }}</span>
                                                        </div>
                                                        <div class="hero-menu-item-details">
                                                            <p>{{ $menu_item->detail }}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <!-- header-menu-item end-->
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <!--tab end -->
                                    </div>
                                    <!--tabs end -->
                                </div>
                            </div>
                        </div>
                        <!--  hero-menu_content end  -->
                        <div class="clearfix"></div>
                        @foreach ($categories as $category)
                            <a href="{{ url('menu/'. $category->code) }}" class="hero_btn" style="margin-left:30px;">{{ __('diesel.view_full_menu')}}-{{ $category->name }}<i class="fal fa-long-arrow-right"></i></a>    
                        @endforeach
                        <a href="#" class="pdf-link">Dowload PDF</a>
                    </div>
                </div>
                <!--  hero-menu  end-->
            </div>
        </section>
        <!--  section  end-->
        <!--  section-->
        <section data-scrollax-parent="true">
            <div class="container_tmp">
                <div class="section-title">
                    <h4>{{ __('diesel.people_choose_us') }}</h4>
                    <h2>{{ __('diesel.top_notch') }}</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
                <div class="cards-wrap fl-wrap">
                    <div class="row">
                        <!--card item -->
                        @foreach ($characteristics as $characteristic)
                        <div class="col-md-4">
                            <div class="content-inner fl-wrap">
                                <div class="content-front">
                                    <div class="cf-inner">
                                        <div class="bg "  data-bg="{{ \Asset::get_image_path('characteristic-image', 'normal', $characteristic->image)}}"></div>
                                        <div class="overlay"></div>
                                        <div class="inner">
                                            <h2>{{ $characteristic->title }}</h2>
                                            <h4>{{ $characteristic->subtitle }}</h4>
                                        </div>
                                        <div class="serv-num">0{{ $characteristic->order }}.</div>
                                    </div>
                                </div>
                                <div class="content-back">
                                    <div class="cf-inner">
                                        <div class="inner">
                                            <div class="dec-icon">
                                                <i class="fal fa-fish"></i>
                                            </div>
                                            <p>{{ $characteristic->detail }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        @endforeach
                        <!--card item end -->
                    </div>
                    <div class="section-dec sec-dec_top"></div>
                    <div class="section-dec sec-dec_bottom"></div>
                </div>
                {{-- <a href="about.html" class="btn fl-btn border-btn">Read More About us <i class="fal fa-long-arrow-right"></i></a> --}}
                <div class="images-collage-item col_par" style="width:120px" data-position-left="83" data-position-top="87" data-zindex="1" data-scrollax="properties: { translateY: '150px' }"><img src="https://restabook.kwst.net/dark/images/cube.png" alt=""></div>
            </div>
            <div class="section-bg">
                <div class="bg"  data-bg="https://restabook.kwst.net/dark/images/bg/dec/section-bg.png"></div>
            </div>
        </section>
        <!-- section end  -->
        <!--  section  TODO: VISITAS -->
        {{-- <section class="parallax-section dark-bg hidden-section" data-scrollax-parent="true">
            <div class="brush-dec2"></div>
            <div class="brush-dec"></div>
            <div class="bg par-elem bg_tabs"  data-bg="https://restabook.kwst.net/dark/images/bg/14.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container_tmp">
                <!-- inline-facts -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="254">154</div>
                            </div>
                        </div>
                        <h6>New Visiters Every Week</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="12168">12168</div>
                            </div>
                        </div>
                        <h6>Happy Customers Every Year</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="172">172</div>
                            </div>
                        </div>
                        <h6>Won Awards</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="732">732</div>
                            </div>
                        </div>
                        <h6>Weekly Deliveries</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
            </div>
        </section> --}}
        <!--  section  VISITAS end-->
        <!--  section  -->
        <section class="hidden-section" data-scrollax-parent="true" id="sec4">
            <div class="container_tmp">
                <div class="section-title">
                    <h4>{{ $gallerySubtitle }}</h4>
                    <h2> {{ $galleryTitle }}</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
                <div class="clearfix"></div>
                <div class="gallery_filter-button btn"> <i class="fal fa-long-arrow-down"></i></div>
                <!-- gallery-filters -->
                <div class="gallery-filters gth">
                    <a href="#" class="gallery-filter gallery-filter-active"  data-filter="*"><span>01.</span>{{ __('diesel.all_images') }}</a>
                    @php 
                        $arrayFilters = ['dishes','resta_img','events','video_links'];
                    @endphp 
                    @foreach ($categories as $key => $category)
                        <a href="#" class="gallery-filter " data-filter=".{{ $arrayFilters[$key+1]}}" rand(0,3)><span>0{{ $key + 2 }}.</span>{{ $category->name }} </a>
                    @endforeach
                </div>
                <div class="feedback" style="right: -40px !important; z-index: 10000"> <a href="#sectionForm">[<i class="fa fa-plus"></i>] <span>Feedback</span></a> </div>
                <!-- gallery-filters end-->
                <!-- gallery start -->
                <div class="gallery-items min-pad  lightgallery three-column fl-wrap" style="margin-bottom:50px;">
                    <!-- gallery-item-->
                    <div class="gallery-item dishes">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://restabook.kwst.net/dark/images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/1.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item resta_img events">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://restabook.kwst.net/dark/images/all/14.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/14.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item gallery-item-second dishes">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://restabook.kwst.net/dark/images/all/2.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/2.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item resta_img events">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://restabook.kwst.net/dark/images/all/10.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/10.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item resta_img video_links">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://vimeo.com/10322316" class="box-media-zoom   popup-image"><i class="fal fa-play"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/11.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item dishes">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://restabook.kwst.net/dark/images/all/17.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/17.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item resta_img events video_links">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="box-media-zoom   popup-image"><i class="fal fa-play"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/16.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item resta_img dishes">
                        <div class="grid-item-holder hov_zoom">
                            <a href="https://restabook.kwst.net/dark/images/all/13.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                            <img  src="https://restabook.kwst.net/dark/images/all/13.jpg"    alt="">
                        </div>
                    </div>
                    <!-- gallery-item end-->
                </div>
                <!-- gallery end -->
                <div class="clearfix"></div>
                <div class="bold-separator bold-separator_dark"><span></span></div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!--  section end  -->
        <!-- section   -->
        <section class="column-section no-padding hidden-section" data-scrollax-parent="true">
            <div class="column-wrap-bg right-wrap">
                <div class="bg par-elem "  data-bg="{{ $mainEventImage ? \Asset::get_image_path('event-image', 'normal', $mainEventImage) : ''}}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
            </div>
            <div class="column-section-wrap left-column-section dark-bg" >
                <div class="container_tmp"  >
                    <div class="column-text">
                        <div class="section-title">
                            {{-- <h4>Book a table</h4> --}}
                            <h2>{{ __('diesel.upcoming_events') }}</h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <!-- events-carousel-wrap -->
                        <div class="events-carousel-wrap fl-wrap">
                            <div class="events-carousel fl-wrap">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($events as $event)
                                        <!-- swiper-slide -->
                                        <div class="swiper-slide">
                                            <div class="event-carousel-item">
                                                <h4>{{ $event->title }}</h4>
                                                <span class="event-date">{{ $event->subtitle }}</span>
                                                <p>{{ $event->detail }}</p>
                                            </div>
                                        </div>
                                        <!-- swiper-slide end -->    
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="ec-button ec-button-prev"><i class="fas fa-caret-left"></i></div>
                            <div class="ec-button ec-button-next"><i class="fas fa-caret-right"></i></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="bold-separator"><span></span></div>
                        <!-- events-carousel-wrap end -->
                        {{-- <a href="#" class="hero_btn no-align show-rb">Book Table Now<i class="fal fa-long-arrow-right"></i></a> --}}
                    </div>
                </div>
                <div class="illustration_bg">
                    <div class="bg"  data-bg="https://restabook.kwst.net/dark/images/bg/dec/6.png"></div>
                </div>
            </div>
        </section>
        <!-- section end  -->
        <!-- section   -->
        <section id="sec5">
            <div class="brush-dec2 brush-dec_bottom"></div>
            <div class="container_tmp">
                <div class="section-title">
                    <h4>{{ __('diesel.what_said_about_us') }}</h4>
                    <h2>{{ __('diesel.customer_reviews') }}</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="testimonilas-carousel-wrap fl-wrap">
                <div class="tc-button tc-button-next"><i class="fas fa-caret-right"></i></div>
                <div class="tc-button tc-button-prev"><i class="fas fa-caret-left"></i></div>
                <div class="testimonilas-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($reviews as $key => $review)
                            <!--testi-item-->
                            <div class="swiper-slide">
                                <div class="testi-item fl-wrap">
                                    <div class="testi-avatar"><img src="{{ $review['user']['avatar']['large'] ?? asset('assets/img/user.png') }}" alt=""></div>
                                    <div class="testimonilas-text fl-wrap">
                                        <h3>{{ $review['user']['username'] }}</h3>
                                        <div class="star-rating" data-starrating="{{ $review['rating'] }}"> </div>
                                        <a href="{{ $review['url'] }}" target="_blank"><p>"{{ $review['title'] }}"</p></a>
                                        <p>"{{ trim( $review['text'] ) }}"</p>
                                        <span class="testi-number">{{ $key+1 }}.</span>
                                    </div>
                                </div>
                            </div>
                            <!--testi-item end-->    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tc-pagination"></div>
            </div>
        </section>
        <!-- section end  -->
        <!--  section  -->
        <section class=" no-padding dark-bg hidden-section"  id="sec6">
            <div class="map-container">
                <div id="singleMap"></div>
                <div class="scrollContorl"></div>
            </div>
            <!-- map-view-wrap -->
            <div class="map-view-wrap">
                <div class="container_tmp">
                    <div class="map-view-wrap_item">
                        <div class="contact-details">
                            <h4>{{ __('diesel.contacts_details') }}</h4>
                            <ul>
                                <li><span><i class="fal fa-map-marked-alt"></i> {{ $address->key }} :</span> <a href="#">{{ $address->value }}</a></li>
                                <li><span><i class="fal fa-phone-rotary"></i> {{ $phone->key }} :</span> <a href="#">+{{ $phone->value }}</a></li>
                                <li><span><i class="fal fa-mailbox"></i> {{ $email->key }} :</span> <a href="#">{{ $email->value }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--map-view-wrap end -->
            <div class="brush-dec"></div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="hidden-section con-sec big-padding" data-scrollax-parent="true" id="sectionForm">
            <div class="container_tmp">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-title text-align_left">
                            <h2>{{ __('diesel.get_in_touch') }}</h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <div class="text-block ">
                            <p>{{ __('diesel.get_in_touch_message') }}
                            </p>
                        </div>
                        <div class="contactform-wrap">
                            <div id="message"></div>
                            <form  class="custom-form" action="{{ route('contact-form') }}" name="contactform" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="name2" placeholder="{{ __('diesel.name') }} *" value="" required/>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  name="email" id="email2" placeholder="{{ __('diesel.email') }} *" value="" required/>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  name="phone" id="phone2" placeholder="{{ __('diesel.cellphone') }} *" value="" required/>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class=" fl-wrap">
                                                <select name="subject" id="subject2" class="chosen-select no-search-select">
                                                    <option value="any">{{ __('diesel.subjects.any') }}</option>
                                                    <option value="upcoming-events">{{ __('diesel.subjects.upcoming-events') }} </option>
                                                    <option value="book-table">{{ __('diesel.subjects.book-table') }}</option>
                                                    <option value="banquet">{{ __('diesel.subjects.banquet') }}</option>
                                                    <option value="other">{{ __('diesel.subjects.other') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea name="comments"  id="comments2" cols="40" rows="3" placeholder="{{ __('diesel.message') }}:"></textarea>
                                    <div class="clearfix"></div>
                                    <button class="btn float-btn flat-btn color-bg" type="submit">{{ __('diesel.btn_send_title') }} <i class="fal fa-long-arrow-right"></i></button>
                                </fieldset>
                            </form>
                        </div>
                        <div class="section-dec sec-dec_top"></div>
                    </div>
                    <div class="col-md-4">
                        <img src="https://restabook.kwst.net/dark/images/all/22.jpg"  class="respimg"  alt="">
                    </div>
                </div>
            </div>
            <div class="section-bg">
                <div class="bg"  data-bg="https://restabook.kwst.net/dark/images/bg/dec/section-bg.png"></div>
            </div>
        </section>
        <!--  section end  -->
        <div class="brush-dec2 brush-dec_bottom"></div>
    </div>
    <!-- content end  -->


    @push('scripts')
        <script  src="https://maps.google.com/maps/api/js?key=AIzaSyBszJ58szEVMAdEA5Mzzkqo03o9EusTYng"></script>

        <script src="{{ asset('assets/templates/master/dark/js/map.js') }}"></script>
        <script>
            $(document).ready(function(){
                var countEvents = {!! $events->count() !!};
                if ( countEvents == 1) {
                    var j2 = new Swiper(".events-carousel .swiper-container", {
                        preloadImages: false,
                        slidesPerView: 1,
                        spaceBetween: 20,
                        loop: true,
                        grabCursor: true,
                        mousewheel: false,
                        centeredSlides: false,
                        navigation: {
                            nextEl: '.ec-button-next',
                            prevEl: '.ec-button-prev',
                        },
                        breakpoints: {
                            1064: {
                                slidesPerView: 2,
                            },
                            640: {
                                slidesPerView: 1,
                            },
                        }
                    });
                }
            })
        </script>
    @endpush
</x-master-layout>