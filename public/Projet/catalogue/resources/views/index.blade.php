@extends('layout')

@section('content')
<div class="d-flex flex-fill " style="min-height: 0px;">
    @includeif('navbar-side')
    <div id="content-container" class="container-fluid flex-fill " style="overflow-y: auto;min-width: 0px;">
        @if($medias->where('media_type', 'App\Models\Movie')->count() > 0)
        @includeif('partials.swiper', ['title' => __("Movie"), 'medias' => $medias->where('media_type',
        'App\Models\Movie')])
        @endif
        @if($medias->where('media_type', 'App\Models\Serie')->count() > 0)
        @includeif('partials.swiper', ['title' => __('Series'), 'medias' => $medias->where('media_type',
        'App\Models\Serie')])
        @endif
    </div>
    <button data-bs-toggle="button" class="btn btn-primary p-0 rounded-circle d-lg-none position-absolute"
        id="side-bar-expender"><i class="fas fa-angle-right"></i></button>
</div>

<script>
    var swiper = new Swiper(".swiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        loop: true,
        slidesPerGroup: 1,
        preloadImages: false,
        lazy: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });
</script>
@endsection