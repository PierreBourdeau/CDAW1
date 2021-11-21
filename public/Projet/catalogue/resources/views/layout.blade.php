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
        function displayMediaModal(element) {
            let media = JSON.parse($(element).attr('media'));
            let media_type = media.media_type.split('\\').pop();
            if (media_type == 'Movie') {
                let mediaContent = JSON.parse($(element).attr('movie'));
                $('#mediaModalContent').html('');
                $('#mediaModalContent').append(`<div><strong class="me-2">{{__("Length")}} :</strong>${mediaContent.length}</div>`);
                $('#mediaModalContent').append(`<div><strong class="me-2">{{__("Casting")}} :</strong>${mediaContent.cast}</div>`);
            } else if (media_type === "Book") {

            } else {

            };
            $('#mediaModalLabel').html(media.title);
            $('#mediaModalPicture').attr('src', media.image);
            $('#mediaModalYear').html(media.year);
            $('#mediaModalCreator').html(media.creator);
            $('#mediaModalDescription').html(media.description);
            $('#mediaModalRating').html(media.rating);
            let url = "{{route('media-edit', ['id' => ':id'])}}";
            url = url.replace(':id', media.id);
            $('#mediaModalEditBtn').attr('href', url);
            $('#mediaModalDeleteInput').attr('value', media.id);
            $('#mediaModal').modal('show');
        }
    </script>
</body>

</html>