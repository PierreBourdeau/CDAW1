<div class="list-group list-group-flush">
    @foreach($user->playlists as $key => $playlist)
    <div class="playlistBtnContainer d-flex">
        <button data-count="{{$playlist->medias->count()}}" data-id="{{$playlist->id}}" onclick="getPlaylist(this);"
            type="button"
            class=" button-style-less playlist-list-tile bg-transparent text-light list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            {{$playlist->name}}
            <span class="badge bg-primary rounded-pill">{{$playlist->medias->count()}}</span>
        </button>
        <button class="btn btn-sm btn-danger deletePlaylistBtn ms-2" type="button" data-id="{{$playlist->id}}"
            onclick="deletePlaylist(this)" data-playlist="{{$playlist->name}}">
            <i class="fas fa-minus"></i>
        </button>
    </div>
    @endforeach
</div>