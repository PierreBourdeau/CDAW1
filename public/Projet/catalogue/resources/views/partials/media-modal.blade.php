<!-- Modal -->
<div class="modal fade black-modal" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaModalLabel"></h5>
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
                        <button class="btn btn-primary" id="addToPlaylistBtn" data-media="{{$media->id}}" data-bs-target="#mediaModal" data-bs-toggle="modal">
                            <i class="far fa-plus-square"></i> {{__('Add to playlist')}}
                        </button>
                        @else
                        <a class="btn btn-primary" href="{{route('user.login')}}">
                            <i class="far fa-plus-square"></i> {{__('Add to playlist')}}
                        </a>
                        @endif
                    </div>
                    <div class="col text-center">
                        <form id="likeForm" name="likeForm">
                            @csrf
                            <input type="hidden" name="media_id" value="{{$media->id}}" id="mediaModalLike" readonly>
                            <button class="btn btn-danger" type="submit" id="mediaModalLikeBtn">
                                @if(Auth::check() && Auth::user()->liked()->where('media_id', $media->id)->exists())
                                <i class="fas fa-heart"></i>
                                @else
                                <i class="far fa-heart"></i>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col flex-column d-flex">
                        <span><strong>{{__('Creator')}} :</strong>
                            <span id="mediaModalCreator">{{$media->creator}}</span>
                        </span>
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
                <div class="row mt-3">
                    <div class="col d-flex flex-column">
                        <strong>{{__('Description')}}</strong>
                        <p id="mediaModalDescription">
                            {{$media->description}}
                        </p>
                    </div>
                </div>
                @php
                $media_type = explode("\\", $media->media_type);
                $media_type = array_pop($media_type);
                @endphp
                @if($media_type == 'Movie')
                <div class="row" id="mediaModalContent">
                    <div><strong class="me-2">{{__("Length")}} :</strong>{{$media->getMedia->length}}</div>
                    <div><strong class="me-2">{{__("Casting")}} :</strong>{{$media->getMedia->cast}}</div>
                </div>
                @endif
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