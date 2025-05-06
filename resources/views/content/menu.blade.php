<x-master-layout>
    
    <div class="content woocommerce">
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="{{ \Asset::get_image_path( 'category-image', 'normal', $category->image ) }} " data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container_tmp">
                <div class="section-title">
                    <h2 class="title__{{ $category->code }}">{{ $category->name }}</h2>
                    <h3 class="subtitle__{{ $category->code }}">"{{ $category->detail }}"</h3>
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
                @php
                    $menuItems = \App\Models\MenuItem::whereHas('menu', function($q) use($category ) {
                        $q->where('categoryId', $category->id);
                    })->whereNotNull('image')->orderBy('order')->paginate(config('nodes.per_page_front'), ['*'], 'page', 1);
                @endphp 
                <div class="cards-wrap fl-wrap more__items">
                    @include('includes.menu-items', ['menuItems'=>$menuItems, 'page'=> 1])
                    {{-- <div class="gallery-items min-pad  lightgallery three-column fl-wrap " style="margin-bottom:50px;">
                    </div> --}}
                    <div class="clearfix"></div>
                    <div class="bold-separator bold-separator_dark"><span></span></div>
                    <div class="clearfix"></div>
                </div>
                
                <input type="hidden" id="input-category" value="{{ $category->id }}">
                <input type="hidden" id="input-current__page" name="current__page" value="{{ $menuItems->currentPage() }}">
                <div class="row">
                    <div class="col-md-6">
                        @if( $category->file )
                            <a href="{{ \Asset::get_file( 'category-file', $category->file ) }}" target="_blank" class="btn" target="_self">{{ __('diesel.download_pdf') }}</i></a>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:void(0)" id="btn-show__more" class="btn" target="_self">{{ __('diesel.show_more') }}</i></a>
                    </div>
                </div>
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
    <script>
        $('#btn-show__more').click(function(){
            var category = $('#input-category').val();
            var nextPage = parseInt( $('#input-current__page').val() ) + 1;
            if( nextPage == 1 ) return;
            $('.loader').show();
            $.ajax({
                type : 'POST',
                url  : '/load-more-products',
                cache: true,
                data : {"page": nextPage, "category":category, "_token": "{{ csrf_token() }}"},
                success : function(response) {
                    $('.loader').hide();
                    if( response['status'] && response['html'] ) {
                        response['html']
                        $( response['html'] ).appendTo( ".more__items" );
                        $('#input-current__page').val(nextPage);
                        $(".lightgallery").data("lightGallery").destroy(true);
                        $(".lightgallery"),
                        $(".lightgallery").lightGallery({
                            selector: ".lightgallery a.popup-image",
                            cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
                            download: false,
                            loop: false,
                            counter: false
                        });
                    } else{
                        $('#input-current__page').val(0);
                        // Swal.close();
                        // var fmessage = response['message'];
                        // if( typeof response['errors'] !== 'undefined' ) {
                        //     fmessage = fmessage + evalArrayErrors(response['errors']);
                        // }
                        // Swal.fire('Error', fmessage, 'error');
                    }
                }
            });            
        });
        $(document).ready(function(){
            $('.loader').hide();
        });
    </script>
    @endpush
</x-master-layout>