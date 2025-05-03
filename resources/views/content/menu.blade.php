<x-master-layout>
    
    <div class="content woocommerce">
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="{{ \Asset::get_image_path( 'category-image', 'normal', $category->image ) }} " data-scrollax="properties: { translateY: '30%' }"></div>
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
                @php
                    $menuItems = \App\Models\MenuItem::whereHas('menu', function($q) use($category ) {
                        $q->where('categoryId', $category->id);
                    })->whereNotNull('image')->paginate(config('nodes.per_page_front'), ['*'], 'page', 1);
                @endphp 
                <div class="cards-wrap fl-wrap">
                    <div class="row more__items">
                        @include('includes.menu-items', ['menuItems'=>$menuItems, 'page'=> 1])
                    </div>
                </div>
                <div>
                    <div class="loader"></div> 
                </div>
                <input type="hidden" id="input-category" value="{{ $category->id }}">
                <input type="hidden" id="input-current__page" name="current__page" value="{{ $menuItems->currentPage() }}">
                <div class="clearfix"></div>
                <div class="bold-separator bold-separator_dark"><span></span></div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn" target="_self">{{ __('diesel.download_pdf') }}</i></a>
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