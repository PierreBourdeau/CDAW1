@extends('layout')

@section('content')
<div class="d-flex flex-fill " style="min-height: 0px;">
    @includeif('navbar-side')
    <div class="container-fluid flex-fill " style="overflow-y: auto;min-width: 0px;">
        <div class="mt-3">
            <h5>{{__('Movies')}}</h5>
            <div>
                <div class="swiper movieSwiper py-4">
                    <div class="swiper-wrapper">
                        @foreach($movies as $movie)
                        <div class='swiper-slide tile-{$key}'>
                            <button type="button" class="button-style-less w-100" data-movie="{{$movie}}"
                                data-media="{{$movie->media}}">
                                <img src='{{$movie->media->image}}' />
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <button data-bs-toggle="button" class="btn btn-primary p-0 rounded-circle d-lg-none position-absolute"
        id="side-bar-expender"><i class="fas fa-angle-right"></i></button>
</div>
<script>
    new Swiper(".movieSwiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        loop: true,
        slidesPerGroup: 5,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });
</script>
@endsection