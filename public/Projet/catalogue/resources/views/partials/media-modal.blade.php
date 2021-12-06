<!-- Modal -->
<div class="modal fade black-modal" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                @php
                $media_type = explode("\\", $media->media_type);
                $media_type = array_pop($media_type);
                @endphp
                <h5 class="modal-title" id="mediaModalLabel">{{__($media_type).' - '}}{{$media->title}}</h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <img id="mediaModalPicture" src="{{asset('front/img/media/'.$media->image);}}"
                        style="max-width: 250px !important;" />
                </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        @if(Auth::check())
                        <button class="btn btn-primary btn-sm" id="addToPlaylistBtn" data-media="{{$media->id}}"
                            data-bs-target="#mediaModal" data-bs-toggle="modal">
                            <i class="far fa-plus-square"></i> {{__('Add to playlist')}}
                        </button>
                        @else
                        <a class="btn btn-primary btn-sm" href="{{route('user.login')}}">
                            <i class="far fa-plus-square"></i> {{__('Add to playlist')}}
                        </a>
                        @endif
                    </div>
                    <div class="col text-center">
                        <form id="likeForm" name="likeForm">
                            @csrf
                            <input type="hidden" name="media_id" value="{{$media->id}}" id="mediaModalLike" readonly>
                            <button class="btn btn-danger btn-sm" type="submit" id="mediaModalLikeBtn">
                                @if(Auth::check() && Auth::user()->liked()->where('media_id', $media->id)->exists())
                                <i class="fas fa-heart"></i>
                                @else
                                <i class="far fa-heart"></i>
                                @endif
                            </button>
                        </form>
                    </div>
                    <div class="col text-center">
                        @if(Auth::check())
                        @if(!Auth::user()->seen()->where('media_id', $media->id)->exists())
                        <button class="btn btn-sm btn-success" type="button" id="addToSeenListBtn"
                            onclick="displayAddToSeenModal(this)" data-media="{{$media->id}}"
                            data-bs-target="#mediaModal" data-bs-toggle="modal">
                            <i class="fas fa-check"></i> {{__('Add to seen list')}}
                        </button>
                        @else
                        <form method="POST" action="{{route('remove-from-seen')}}">
                            @csrf
                            <input type="hidden" name="media_id" value="{{$media->id}}" readonly required />
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="far fa-minus-square"></i> {{__('Remove from seen list')}}
                            </button>
                        </form>
                        @endif
                        @else
                        <a class="btn btn-sm btn-success" href="{{route('user.login')}}">
                            <i class="fas fa-check"></i> {{__('Add to seen list')}}
                        </a>
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-wrap mt-3">
                    @foreach($media->tags as $tag)
                    <button type="button" class="tag_a btn btn-primary btn-sm">
                        {{$tag->name}}</button>
                    @endforeach
                </div>
                <div class="row mt-3">
                    <div class="col flex-column d-flex">
                        @if(isset($media->creator))
                        <span><strong>{{__('Creator')}} :</strong>
                            <span id="mediaModalCreator">{{$media->creator}}</span>
                        </span>
                        @endif
                        <span><strong>{{__('Year')}} :</strong>
                            <span id="mediaModalYear">{{$media->year}}</span>
                        </span>
                    </div>
                    <div class="col flex-column d-flex">
                        <span class="text-end"><strong>{{__('Rating')}} :</strong><span class="mx-2"
                                id="mediaModalRating">{{$media->rating}}</span><i
                                class="fas fa-heart text-danger"></i></span>
                    </div>
                </div>
                @if(isset($media->description))
                <div class="row mt-3">
                    <div class="col d-flex flex-column">
                        <strong>{{__('Description')}}</strong>
                        <p id="mediaModalDescription">
                            {{$media->description}}
                        </p>
                    </div>
                </div>
                @endif
                @if($media_type == 'Movie')
                <div class="row" id="mediaModalContent">
                    <div><strong class="me-2">{{__("Length")}} :</strong>{{$media->getMedia->length}}</div>
                    <div><strong class="me-2">{{__("Casting")}} :</strong>{{$media->getMedia->cast}}</div>
                </div>
                @endif
                @if($media_type == 'Serie')
                <div class="row" id="mediaModalContent">
                    <div><strong class="me-2">{{__("Seasons")}} :</strong>{{$media->getMedia->seasons}}</div>
                    <div><strong class="me-2">{{__("Casting")}} :</strong>{{$media->getMedia->cast}}</div>
                </div>
                @endif
                <div class="accordion mt-3" id="commentsAccordion">
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{__('Comments').' ('. $media->comments()->where('status', 'A')->count().')'}}
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#commentsAccordion">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <form id="postComment">
                                        @csrf
                                        <input type="hidden" name="media_id" value="{{$media->id}}" readonly required />
                                        <label for="exampleFormControlTextarea1"
                                            class="form-label">{{__('Write comment :')}}</label>
                                        <textarea required class="form-control bg-transparent text-light"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <div class="text-end">
                                            <button type="submit" class="mt-2 btn btn-primary btn-sm"> <i
                                                    class="fas fa-paper-plane"></i> {{__('Send')}}</button>
                                        </div>
                                    </form>
                                </div>
                                @auth
                                <div id="pending-comments">
                                    @foreach(Auth::user()->comments->where('status', 'P')->where('media_id', $media->id)
                                    as $selfComment)
                                    @includeif('partials.comment', ['comment' => $selfComment])
                                    @endforeach
                                </div>
                                @endauth
                                <div id="comments-area">
                                    @foreach($media->comments->where('status', 'A') as $comment)
                                    @includeif('partials.comment', ['comment' => $comment])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @auth
            @if (auth()->user()->role == 'admin')
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{route('media-edit', ['id' => $media->id])}}" id="mediaModalEditBtn">
                    <i class="fas fa-edit"></i>
                    {{__('Edit')}}</a>
                <form method="POST" action="{{route('media-delete')}}">
                    @csrf
                    <input type="hidden" id='mediaModalDeleteInput' name="id" readonly value="$media->id" />
                    <button type="submit" class="btn btn-danger" id="mediaModalDeleteBtn"><i
                            class="fas fa-trash-alt"></i>{{__('Delete')}}</button>
                </form>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>
<script>
    $("#mediaModalLikeBtn").on('click', (e) => {
        e.preventDefault();
        let fd = new FormData(document.getElementById('likeForm'));
        $.ajax({
            url: "{{route('media-like')}}",
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            error: (err) => {
                console.log(err);
            },
            success: (likedList) => {
                if ($('#mediaModalLikeBtn .fa-heart').hasClass('fas')) {
                    $('#mediaModalLikeBtn .fa-heart').removeClass('fas').addClass('far');
                } else {
                    $('#mediaModalLikeBtn .fa-heart').removeClass('far').addClass('fas');
                }
                $('#nav-liked-list').html(likedList);
            }
        })
    })
</script>
<script>
    $('#addToPlaylistBtn').on('click', (e) => {
        e.preventDefault();
        let getUrl = "{{route('get-add-to-playlist', ['media_id' => ':media_id'])}}";
        getUrl = getUrl.replace(':media_id', $('#addToPlaylistBtn').data('media'));
        $.ajax({
            url: getUrl,
            method: 'get',
            error: (resp) => {
                console.log(resp);
            },
            beforeSend: () => {
                $(".preloader").fadeIn();
            },
            complete: () => {
                $('.preloader').fadeOut();
            },
            success: (modal) => {
                $('body').has('#playlistAddModalContainer').length ? $('#playlistAddModalContainer').replaceWith(resp) : $('body').append(modal);
                $('#playlistAddModal').modal('show');
            }
        })
    })
</script>