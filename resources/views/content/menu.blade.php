<x-master-layout>
    <div class="content">
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="https://restabook.kwst.net/dark/images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container_tmp">
                <div class="section-title">
                    {{-- <h4>Special menu offers.</h4> --}}
                    <h2>{{ $category->name }}</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
            </div>
            <div class="brush-dec"></div>
        </section>
    
        <section class="small-top-padding">
            <div class="brush-dec2 brush-dec_bottom"></div>
            <div class="container_tmp">
                <!--  hero-menu_header  end-->
                <div class="hero-menu single-menu  tabs-act fl-wrap">
                    <div class="gallery_filter-button btn">Show Filters <i class="fal fa-long-arrow-down"></i></div>
                    <!--  hero-menu_header-->
                    <div class="hero-menu_header fl-wrap gth">
                        <ul class="tabs-menu  no-list-style">
                            @foreach( $category->all_menus as $key => $menu ) 
                                <li class="{{ $key == 0 ? 'current' : '' }}"><a href="#tab-{{ $key + 1 }}"><span>{{ $key + 1 }}.</span>{{ $menu->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--  hero-menu_header  end-->
                    <!--  hero-menu_content   -->
                    <div class="hero-menu_content fl-wrap">
                        <div class="tabs-container">
                            <div class="tab">
                                <!--tab -->
                                @foreach ($category->all_menus as $key => $menu)
                                    @if( $key == 0 )
                                    <div id="tab-1" class="tab-content first-tab">
                                        @foreach( $menu->all_menu_items as $menuItem )
                                        @php 
                                            $rand = rand(1,10);
                                        @endphp 
                                        <!-- hero-menu-item-->
                                        <div class="hero-menu-item">
                                            <a href="https://restabook.kwst.net/dark/images/menu/{{ $rand }}.jpg" class="hero-menu-item-img image-popup"><img src="https://restabook.kwst.net/dark/images/menu/thumbnails/{{ $rand }}.jpg" alt=""></a>
                                            <div class="hero-menu-item-title fl-wrap">
                                                <h6>{{ $menuItem->title }}</h6>
                                                <div class="hmi-dec"></div>
                                                <span class="hero-menu-item-price">Bs. {{ $menuItem->price }}</span>
                                                {{-- <div class="add_cart">Añadir al carrito</div> --}}
                                            </div>
                                            <div class="hero-menu-item-details">
                                                <p>{{ $menuItem->detail }}</p>
                                            </div>
                                        </div>
                                        <!-- hero-menu-item end-->  
                                        @endforeach 
                                    </div>
                                    @else 
                                    <div class="tab">
                                        <div id="tab-{{ $key + 1 }}" class="tab-content">
                                            @foreach( $menu->all_menu_items as $menuItem )
                                            @php 
                                                $rand = rand(1,10);
                                            @endphp 
                                            <!-- hero-menu-item-->
                                            <div class="hero-menu-item">
                                                <a href="https://restabook.kwst.net/dark/images/menu/{{$rand}}.jpg" class="hero-menu-item-img image-popup"><img src="https://restabook.kwst.net/dark/images/menu/thumbnails/{{$rand}}.jpg" alt=""></a>
                                                <div class="hero-menu-item-title fl-wrap">
                                                    <h6>{{ $menuItem->title }}</h6>
                                                    <div class="hmi-dec"></div>
                                                    <span class="hero-menu-item-price">Bs. {{ $menuItem->price }}</span>
                                                    {{-- <div class="add_cart">Añadir al carrito</div> --}}
                                                </div>
                                                <div class="hero-menu-item-details">
                                                    <p>{{ $menuItem->detail }}</p>
                                                </div>
                                            </div>
                                            <!-- hero-menu-item end-->  
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif 
                                @endforeach
                            </div>
                            <!--tabs end -->
                        </div>
                    </div>
                    <!--  hero-menu_content end  -->
                </div>
                <!--  hero-menu  end-->                                
                <div class="clearfix"></div>
                <div class="bold-separator bold-separator_dark"><span></span></div>
                <div class="clearfix"></div>
                <a href="#" class="btn  ">Download menu in PDF<i class="fal fa-long-arrow-right"></i></a>                       
            </div>
            <div class="section-bg">
                <div class="bg"  data-bg="https://restabook.kwst.net/dark/images/bg/dec/section-bg.png"></div>
            </div>
        </section>
    </div>

    @push('scripts')
        {{-- <script>
            alert('hol amdans')
        </script> --}}
    @endpush
</x-master-layout>