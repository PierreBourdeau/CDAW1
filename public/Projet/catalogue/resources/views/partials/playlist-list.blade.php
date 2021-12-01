<div class="list-group list-group-flush">
        @foreach($user->playlists as $key => $playlist)
        <button type="button"
                    class="bg-transparent text-light list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    {{$playlist->name}}
            <span class="badge bg-primary rounded-pill">{{$playlist->medias->count()}}</span>
        </button>
    @endforeach
</div>