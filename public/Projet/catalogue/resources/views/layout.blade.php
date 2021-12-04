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
    <!-- Modal -->
    <div class="modal fade black-modal" id="playlistDeleteConfirmationModal" tabindex="-1"
        aria-labelledby="playlistDeleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="playlistDeleteConfirmationModalLabel">{{__('Confirm')}}</h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body text-center">
                    <p>
                        {{__('Do you really want to delete the playlist ? ')}}
                        <strong id="deletePlaylistName"></strong>
                    </p>
                    <form id="deletePlaylistForm" method="POST" action="{{route('delete-playlist')}}">
                        <input type="hidden" name="playlist_id" readonly required />
                        <button data-bs-target="#playlistDeleteConfirmationModal" data-bs-toggle="modal" type="submit"
                            class="btn btn-success"><i class="fas fa-check"></i></button>
                    </form>
                </div>
            </div>
        </div>
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
        function deletePlaylist(element) {
            $('#deletePlaylistForm input[name="playlist_id"]').val($(element).data('id'));
            $('#playlistDeleteConfirmationModal .modal-body #deletePlaylistName').html($(element).data('playlist'));
            $('#playlistDeleteConfirmationModal').modal('show');
        }
    </script>
    <script>
        $(document).on('submit', '#deletePlaylistForm', (e) => {
            e.preventDefault();
            let fd = new FormData(document.getElementById('deletePlaylistForm'));
            $.ajax({
                url: "{{ route('delete-playlist') }}",
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
                }
            })
        })
    </script>
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
        function getLikedList() {
            $.ajax({
                url: '{{route("get-likes")}}',
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
                success: (swiper) => {
                    $('#content-container').prepend(swiper);
                    new Swiper(".swiper", {
                        slidesPerView: "auto",
                        spaceBetween: 30,
                        loop: false,
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
    <script>
        function getPlaylist(element) {
            let getUrl = "{{route('get-playlist', ['id' => ':id'])}}";
            getUrl = getUrl.replace(':id', $(element).data('id'));
            $.ajax({
                url: getUrl,
                method: "get",
                error: (resp) => {
                    console.log("err");
                },
                beforeSend: () => {
                    $(".preloader").fadeIn();
                },
                complete: () => {
                    $('.preloader').fadeOut();
                },
                success: (swiper) => {
                    $('#content-container').prepend(swiper);
                    new Swiper(".swiper", {
                        slidesPerView: "auto",
                        spaceBetween: 30,
                        loop: false,
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
    <script>
        function getTagSwiper(element) {
            getUrl = window.location.href + '/' + $(element).data('tag');
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
                success: (swiper) => {
                    $('#content-container').prepend(swiper);
                    new Swiper(".swiper", {
                        slidesPerView: "auto",
                        spaceBetween: 30,
                        loop: false,
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
    <script>
        $(document).on('submit', '#postComment', (e) => {
            e.preventDefault();
            let fd = new FormData(document.getElementById('postComment'));
            fd.append('comment', $('#postComment textarea').val());
            $.ajax({
                url: '{{route("post-comment")}}',
                method: 'post',
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
                success: (comment) => {
                    $('#pending-comments').prepend(comment);
                    $('#postComment textarea').val('');
                }
            })
        })
    </script>
</body>

</html>