<!doctype html>
<html lang="en" @if($rtl==1) dir="rtl" @endif>

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== Title ======-->
    <title>{{$bs->website_title}}</title>
    <!--====== Bootstrap ========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!--====== jQuery =========-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @if (count($langs) == 0)
    <style media="screen">
        .support-bar-area ul.social-links li:last-child {
            margin-right: 0px;
        }

        .support-bar-area ul.social-links::after {
            display: none;
        }
    </style>
    @endif
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/style/main.css')}}" />

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</head>

<body>
    <div class="preloader">
        <div class="container-fluid preloader h-100">
            <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column vh-100">
        @includeif('navbar-top')
        @yield('content')
    </div>
    <script>
        "use strict";
        var mainurl = "{{url('/')}}";
        var rtl = {{ $rtl }};
        var vap_pub_key = "{{env('VAPID_PUBLIC_KEY')}}";
    </script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>
    <script>
        function displayMediaModal(id) {
            let getUrl = "{{route('get-media', ['id' => ':id'])}}";
            getUrl = getUrl.replace(':id', id);
            $.ajax({
                url: getUrl,
                method: 'GET',
                error: (resp) => {
                    console.log(resp);
                },
                beforeSend: () => {
                    $(".preloader").fadeIn();
                },
                complete: () => {
                    $('.preloader').fadeOut();
                },
                success: (resp) => {
                    $('body').has('#mediaModal').length ? $('#mediaModal').replaceWith(resp) : $('body').append(resp);
                    $('#mediaModal').modal('show');
                }
            })
        }
    </script>
    <script>
        $(document).on('submit', "#addPlaylistForm", (e) => {
            e.preventDefault();
            let form = $(this);
            let fd = new FormData(document.getElementById('addPlaylistForm'));
            $.ajax({
                url: "{{ route('create-playlist') }}",
                method: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                error: (resp) => {
                    console.log("err");
                },
                beforeSend: () => {
                    $(".preloader").fadeIn();
                },
                complete: () => {
                    $('.preloader').fadeOut();
                },
                success: (playlistList) => {
                    $('#nav-playlists-list').html(playlistList);
                    $('#addPlaylistForm input[name="name"]').val('');
                    $('#playlistCollapse').collapse('toggle');
                }
            })
        })
    </script>
    <script>
        function getSwiper(element) {
            let getUrl = "{{route('get-swiper', ['id' => ':id'])}}";
            if ($(element).data('id')) {
                getUrl = getUrl.replace(':id', $(element).data('id'));
            } else {
                getUrl = getUrl.replace(':id', 'like');
            }
            $.ajax({
                url: getUrl,
                method: 'get',
                error: (resp) => {
                    console.log("err");
                },
                beforeSend: () => {
                    $(".preloader").fadeIn();
                },
                complete: () => {
                    $('.preloader').fadeOut();
                },
                success: (playlistSwiper) => {
                    $('#content-container').prepend(playlistSwiper);
                    console.log(swiper);
                    new Swiper(".swiper", {
                        slidesPerView: "auto",
                        spaceBetween: 30,
                        loop: true,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        }
                    });
                }
            })
        }
    </script>
</body>

</html>