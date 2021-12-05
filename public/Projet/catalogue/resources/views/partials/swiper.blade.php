<div class="mt-3">
    <h5>{{$title}}</h5>
    <div>
        <div class="swiper py-4">
            <div class="swiper-wrapper">
                @foreach($medias as $key=>$media)
                <div class='swiper-slide tile-{{$key}}'>
                    <button type="button" onclick="displayMediaModal({{$media->id}})" id="tile-btn-{{$key}}"
                        class="button-style-less w-100">
                        <img src='{{asset("/front/img/media/".$media["image"])}}' class="swiper-lazy" />
                        <div class="swiper-lazy-preloader">

                        </div>
                    </button>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>