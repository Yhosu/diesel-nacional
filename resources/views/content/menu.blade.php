<x-master-layout>
    <div class="content woocommerce">
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="https://restabook.kwst.net/dark/images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container_tmp">
                <div class="section-title">
                    <h2>{{ $category->name }}</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
            </div>
            <div class="brush-dec"></div>
        </section>

        
        <section class="small-top-padding">
            <nav class="scroll-nav scroll-init">
                <ul>
                    @foreach ($category->all_menus as $key => $menu)
                    <li>
                        <a class="scroll-link {{ $key == 0 ? 'act-scrlink' : '' }}" href="#{{ $menu->id }}"><span>{{ $menu->title }}</span></a>
                    </li>
                    @endforeach
                </ul>
            </nav>
            <div class="brush-dec2 brush-dec_bottom"></div>
            <div class="container">
                @foreach ($category->all_menus as $key => $menu)
                <div class="menu-wrapper single-menu fl-wrap" id="{{ $menu->id }}" data-scrollax-parent="true">
                    <div class="menu-wrapper-title fl-wrap">
                        <div class="menu-wrapper-title-item">
                            <h4>{{ $menu->title }}</h4>
                            <h5>{{ $menu->detail }}</h5>
                        </div>
                        <div class="bg par-elem" data-bg="https://webredox.net/demo/wp/restabook/dark/wp-content/uploads/2020/05/2.jpg" data-scrollax="properties: { translateY: '40%' }" style="background-image: url('https://webredox.net/demo/wp/restabook/dark/wp-content/uploads/2020/05/2.jpg'); transform: translateZ(0px) translateY(-39.5098%);"></div>
                        <div class="overlay"></div>
                        <span class="menu-wrapper-title_number">{{ $key + 1 }}.</span>
                    </div>
                    @foreach ($menu->all_menu_items as $menuItem)
                    <div class="hero-menu-item rs-dark-loop" style="height: 88px;">
                        <a href="https://webredox.net/demo/wp/restabook/dark/wp-content/uploads/2020/05/2-4.jpg" class="hero-menu-item-img image-popup">
                            <img src="https://webredox.net/demo/wp/restabook/dark/wp-content/uploads/2020/05/2-4.jpg" alt="{{ $menuItem->title }}" />
                        </a>
                        <div class="hero-menu-item-title fl-wrap">
                            <h6><a href="javascript:void(0);" class="a-default-color">{{ $menuItem->title }}</a></h6>
                            <div class="hmi-dec" style="left: 162.383px;"></div>
                            <span class="hero-menu-item-price">
                                <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi><span class="woocommerce-Price-currencySymbol">Bs </span>{{ currencyFormat( $menuItem->price ) }}</bdi>
                                    </span>
                                </span>
                            </span>
                        </div>
                        <div class="hero-menu-item-details"><p>{{ $menuItem->detail }}</p></div>
                    </div>    
                    @endforeach
                </div>
                <div class="dots-separator fl-wrap"><span></span></div>    
                @endforeach
                <div class="clearfix"></div>
                <div class="bold-separator bold-separator_dark"><span></span></div>
                <div class="clearfix"></div>
                <a href="#" class="btn" target="_self">Download menu in PDF <i class="fal fa-long-arrow-right"></i></a>
            </div>
            <div class="section-bg">
                <div
                    class="bg"
                    data-bg="https://webredox.net/demo/wp/restabook/dark/wp-content/themes/restabook/includes/images/bg/dec/section-bg.png"
                    style="background-image: url('https://webredox.net/demo/wp/restabook/dark/wp-content/themes/restabook/includes/images/bg/dec/section-bg.png');"
                ></div>
            </div>
            <div></div>
        </section>
    </div>

    @push('scripts')
    @endpush
</x-master-layout>