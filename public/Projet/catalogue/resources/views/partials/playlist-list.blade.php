<div class="list-group list-group-flush">
    @foreach($user->playlists as $key => $playlist)
    <button data-count="{{$playlist->medias->count()}}" data-id="{{$playlist->id}}" onclick="getSwiper(this);"
        type="button"
        class="playlist-list-tile bg-transparent text-light list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        {{$playlist->name}}
        <span class="badge bg-primary rounded-pill">{{$playlist->medias->count()}}</span>
    </button>
    @endforeach
</div>