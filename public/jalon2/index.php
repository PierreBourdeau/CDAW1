<?php
include_once './models/film.php';
include_once './models/imdb.php';

//The URL that we want to GET. (from ImDB)
$url = 'https://imdb-api.com/en/API/MostPopularMovies/k_rapxhaf0';

$imdb = new Imdb($url);
$filmsArray = $imdb->get10Films();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./main.css" />

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
    <div class="d-flex w-100 position-relative">
        <div class="navbar-light bg-light col-2 vh-100" style="overflow-y: auto;">
            <div class="text-center mb-3 py-3">
                <a class="navbar-brand" href="#">CDAW</a>
            </div>
            <ul class=" nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fas fa-list-ol"></i> Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fas fa-film"></i> Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"> <i class="fas fa-book-open"></i> Mangas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"> <i class="fas fa-pencil-alt"></i> Cartoons</a>
                </li>
            </ul>
            <div class="container-fluid">
                <hr />
            </div>
            <h5 class="px-2">Tags</h5>
            <div class="d-flex flex-wrap">
                <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i>Action</button>
                <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i>Love</button>
                <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i>Christmas</button>
                <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i>Westen</button>
                <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i>Shonen</button>
                <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i>Suspense</button>
                <a class="w-100 px-2">Show more...</a>
            </div>
            <div class="container-fluid">
                <hr />
            </div>
            <div>
                <h5 class="px-2">Playlists</h5>
                <div class="list-group list-group-flush">
                    <button type="button"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Playlist 1
                        <span class="badge bg-primary rounded-pill">4</span>
                    </button>
                    <button type="button"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Playlist 2
                        <span class="badge bg-primary rounded-pill">10</span>
                    </button>
                    <button type="button"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Playlist 3
                        <span class="badge bg-primary rounded-pill">3</span>
                    </button>
                    <button type="button"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Playlist 4
                        <span class="badge bg-primary rounded-pill">2</span>
                    </button>
                </div>
            </div>
            <div class="container-fluid">
                <hr />
            </div>
            <h5 class="px-2">Loved</h5>
            <div class="list-group list-group-flush">
                <button type="button"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Django Unchained
                    <span class="badge rounded-pill text-danger"><i class="fas fa-heart"></i></span>
                </button>
                <button type="button"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Star Wars II
                    <span class="badge rounded-pill text-danger"><i class="fas fa-heart"></i></span>
                </button>
                <button type="button"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Le seigneur des anneaux I
                    <span class="badge text-danger rounded-pill"><i class="fas fa-heart"></i></span>
                </button>
                <button type="button"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Titanic
                    <span class="badge rounded-pill text-danger"><i class="fas fa-heart"></i></span>
                </button>
            </div>
        </div>
        <div class="col-10 vh-100" style="overflow-y: auto;overflow-x: hidden;">
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-globe-americas"></i> Language
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href='#'>English</a></li>
                                    <li><a class="dropdown-item" href='#'>French</a></li>
                                    <li><a class="dropdown-item" href='#'>Deutch</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex me-auto ms-auto">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <ul class="login navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                            <li class="nav-item d-none d-lg-block"><span class="nav-link">|</span></li>
                            <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
                        </ul>
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid" style="overflow-y: auto;">
                <div class="mb-3">
                    <h5>Action movie</h5>
                    <div>
                        <div class="swiper mySwiper1">
                            <div class="swiper-wrapper">
                                <?php
                                    foreach($filmsArray as $key=>$film) {
                                        echo "<div class='swiper-slide tile-{$key}'><img src='{$film->image}'/></div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var swiper = new Swiper(".mySwiper1", {
                slidesPerView: "auto",
                centeredSlides: true,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });
        </script>
        <script>
        $(window).on('load', e => {
            $('.preloader').fadeIn();
            $('.predloader').fadeOut();
        })

        </script>
</body>

</html>