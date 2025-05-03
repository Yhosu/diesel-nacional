
@foreach ($menuItems as $key => $menuItem)
<div class="col-md-4 page{{$page}}" style="margin: 20px !important;">
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