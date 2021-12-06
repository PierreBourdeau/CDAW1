<!-- Modal -->
<div class="modal fade black-modal" id="addToSeenListModal" tabindex="-1" aria-labelledby="addToSeenListModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToSeenListModalLabel">{{__('Add to seen list')}}</h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                {{__('When did you see it ? ')}}
                <form method="post" action="{{route('add-to-seen')}}">
                    @csrf
                    <input type="hidden" name="media_id" readonly required />
                    <input type="date" class="form-control" required name="date" />
                    <div class="text-center">
                        <button class="btn btn-sm btn-success mt-3" type="submit">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>