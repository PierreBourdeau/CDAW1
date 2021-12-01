<!-- Modal -->
    <div class="modal fade black-modal" id="playlistAddModal" tabindex="-1" aria-labelledby="playlistAddModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="playlistAddModalLabel">{{__('Add to playlist')}}</h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    @foreach($user->playlists as $key => $playlist)
                    @if(!$playlist->medias->contains($media))
                    <form method="POST" action="{{route('add-to-playlist')}}">
                        @csrf
                        <input type="hidden" name="playlist_id" value="{{$playlist->id}}" readonly/>
                        <input type="hidden" name="media_id" readonly value="{{$media}}"/>
                        <button type="submit"
                        class="bg-transparent text-light list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{$playlist->name}}
                        <span class="badge bg-primary rounded-pill">{{$playlist->medias->count()}}</span>
                        </button>
                    </form>
                    @else
                    <form method="POST" action="{{route('remove-from-playlist')}}">
                        @csrf
                        <input type="hidden" name="playlist_id" value="{{$playlist->id}}" readonly/>
                        <input type="hidden" name="media_id" readonly value="{{$media}}"/>
                        <div
                        class="bg-transparent text-light list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{$playlist->name}}
                         <div>
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="badge bg-primary rounded-pill">{{$playlist->medias->count()}}</span>
                        </div>
                        </div>
                    </form>
                    @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mediaModal">
                                <i class="fas fa-backward"></i> {{__('Back')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
