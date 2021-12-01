<div class="navbar-dark bg-dark flex-fill d-lg-block nav-side "
    style="overflow-y: auto; max-width: 15%;min-width: 0px;">
    <div class="container-fluid text-center">
        <ul class=" nav flex-column navbar-nav">
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
        <h5 class="px-2 text-light">Tags</h5>
        <div class="d-flex flex-wrap">
            <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i> Action</button>
            <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i> Love</button>
            <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i> Christmas</button>
            <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i> Western</button>
            <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i> Shonen</button>
            <button type="button" class="tag_a btn btn-primary btn-sm"><i class="fas fa-plus"></i> Suspense</button>
            <a class="w-100 px-2" href="#">Show more...</a>
        </div>
        <div class="container-fluid">
            <hr />
        </div>
        @auth
        <div>
            <h5 class="px-2 text-light">Playlists <a class="" data-bs-toggle="collapse" href="#playlistCollapse"
                    role="button" aria-expanded="false" aria-controls="playlistCollapse">
                    <i class="fas fa-plus text-light"></i> </a></h5>
            <div class="collapse" id="playlistCollapse">
                <div class="card card-body">
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
        <h5 class="px-2 text-light">{{__('Liked')}}</h5>
        <div id="nav-liked-list">
            @includeif('partials.liked-list', ['user' => Auth::user()])    
        </div>
        @endauth
    </div>
</div>