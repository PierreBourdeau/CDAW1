<div class="navbar-dark bg-dark flex-fill d-lg-block nav-side "
    style="overflow-y: auto; max-width: 15%;min-width: 0px;">
    <div class="container-fluid text-center">
        <ul class=" nav flex-column navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('front.index', ['content' => 'home'])}}"> <i class="fas fa-home"></i>
                    {{__('Home')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('front.index', ['content' => 'series'])}}"> <i
                        class="fas fa-list-ol"></i> {{__('Series')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('front.index', ['content' => 'movies'])}}"> <i
                        class="fas fa-film"></i> {{__('Movies')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('front.index', ['content' => 'seen'])}}"><i
                        class="fas fa-check-square"></i>
                    {{__('Seen')}}</a>
            </li>
        </ul>
        <div class="container-fluid">
            <hr />
        </div>
        <h5 class="px-2 text-light">{{__('Tags')}}</h5>
        @includeif('partials.tags-list')
        <div class="container-fluid">
            <hr />
        </div>
        @auth
        <div>
            <div class="d-flex align-items-baseline justify-content-center">
                <h5 class="px-2 text-light">{{__('Playlists')}}</h5>
                <a class="badge bg-primary rounded-pill" data-bs-toggle="collapse" href="#playlistCollapse"
                    role="button" aria-expanded="false" aria-controls="playlistCollapse">
                    <i class="fas fa-plus text-light"></i> </a>
            </div>
            <div class="collapse" id="playlistCollapse">
                <div class="card card-body bg-transparent">
                    <form id="addPlaylistForm">
                        @csrf
                        <input type="text" class="form-control" name="name" required />
                    </form>
                </div>
            </div>
            <div id="nav-playlists-list">
                @includeif('partials.playlist-list', ['user' => Auth::user()])
            </div>
        </div>
        <div class="container-fluid">
            <hr />
        </div>
        <button class="button-style-less" onclick="getLikedList();">
            <h5 class="px-2 text-light">{{__('Liked')}}</h5>
        </button>
        <div id="nav-liked-list">
            @includeif('partials.liked-list', ['user' => Auth::user()])
        </div>
        @endauth
    </div>
</div>