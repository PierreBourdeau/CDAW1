<div class="list-group list-group-flush">
            @foreach($user->liked as $key => $like)
            <button type="button" style="text-align: start;" onclick="displayMediaModal({{$like->media->id}})"
                class="bg-transparent text-light list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                {{$like->media->title}}
            </button>
            @endforeach
        </div>