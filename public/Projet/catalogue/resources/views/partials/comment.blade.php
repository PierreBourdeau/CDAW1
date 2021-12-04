<div class="d-flex">
    <div class="me-2">
        @if (isset($comment->user->photo))
        <img src="{{$comment->user->photo}}" class="rounded-circle" height="32" width="32" />
        @else
        <img src="{{asset('default_profile.jpg');}}" class="rounded-circle" height="32" width="32" />
        @endif
    </div>
    <div>
        <p class="d-flex flex-column"><strong class="me-1">
                {{$comment->user->username}}
                @if($comment->status == 'P')
                <span class="badge bg-warning text-dark">{{__('Pending')}}</span>
                @endif
            </strong>
            {{$comment->comment}}
        </p>
    </div>
</div>