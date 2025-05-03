<div class="row" style="padding-bottom: 50px !important;">
@foreach ($menuItems as $key => $menuItem)
<div class="col-md-4">
    <!-- team-item -->
    <div class="team-box">
        <div class="team-photo">
            <img src="{{ $menuItem->image ? \Asset::get_image_path('menu-item-image', 'normal', $menuItem->image ) : asset('assets/img/isologo.svg') }}" alt="" class="respimg">
            <div class="overlay"></div>
            <div class="team-social">
            </div>
        </div>
        <div class="team-info fl-wrap">
            <h4>{{ $menuItem->title }}</h4>
        </div>
    </div>
</div>
@endforeach
</div>