<!-- Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaModalLabel"></h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <img id="mediaModalPicture" style="max-width: 250px !important;" />
                </div>
                <div class="row mt-3">
                    <div class="col flex-column d-flex">
                        <span><strong>{{__('Creator')}} :</strong> <span id="mediaModalCreator"></span></span>
                        <span><strong>{{__('Year')}} :</strong> <span id="mediaModalYear"></span></span>
                    </div>
                    <div class="col flex-column d-flex">
                        <span class="text-end"><strong>{{__('Rating')}} :</strong><span class="mx-2"
                                id="mediaModalRating"></span><i class="fas fa-heart text-danger"></i></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col d-flex flex-column">
                        <strong>{{__('Description')}}</strong>
                        <p id="mediaModalDescription">

                        </p>
                    </div>
                </div>
                <div class="row" id="mediaModalContent">

                </div>
            </div>
            @auth
            @if (auth()->user()->role == 'admin')
            <div class="modal-footer">
                <a class="btn btn-primary" href id="mediaModalEditBtn"> <i class="fas fa-edit"></i>
                    {{__('Edit')}}</a>
                <form method="POST" action="{{route('media-delete')}}">
                    @csrf
                    <input type="hidden" id='mediaModalDeleteInput' name="id" readonly value />
                    <button type="submit" class="btn btn-danger" id="mediaModalDeleteBtn"><i
                            class="fas fa-trash-alt"></i>{{__('Delete')}}</button>
                </form>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>