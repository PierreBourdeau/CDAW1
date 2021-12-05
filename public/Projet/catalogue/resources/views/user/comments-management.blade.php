@extends('layout')

@section('content')
<div class="d-flex flex-fill flex-column py-5 px-4 container-lg" style="min-height: 0px;overflow-y: auto;">
    <div id="commentStatusRadios">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="commentStatusChoice" id="commentsStatusPending"
                value="pending" href="{{ route('manage-comments', ['status' => 'pending']) }}" @if($status=="pending" )
                checked @endif>
            <label class="form-check-label badge bg-warning text-dark" for="inlineRadio1">{{__('Pending')}}
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="commentStatusChoice" id="commentsStatusAccepted"
                value="accepted" href="{{ route('manage-comments', ['status' => 'accepted']) }}" @if($status=="accepted"
                ) checked @endif>
            <label class="form-check-label badge bg-success text-light" for="inlineRadio2">{{__('Accepted')}}
            </label>
        </div>
    </div>
    <div class="d-flex mt-3">
        <input onkeyup="searchTable()" id="searchBarInput" class="form-control"
            placeholder="{{__('Search username...')}}" />
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Comment')}}</th>
                <th scope="col">{{__('Media')}}</th>
                <th scope="col">{{__('Type')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody id="commentsTable">
            @foreach($comments as $key=>$comment)
            @php
            $media_type = explode("\\", $comment->media->media_type);
            $media_type = array_pop($media_type);
            @endphp
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>@includeif('partials.comment', ['comment' => $comment])</td>
                <td>{{$comment->media->title}}</td>
                <td>{{$media_type}}</td>
                <td>
                    <div class="d-flex">
                        <form action="{{route('delete-comment')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$comment->id}}" required readonly name="comment_id" />
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="fas fa-minus"></i>
                            </button>
                        </form>
                        @if($comment->status != 'A')
                        <form action="{{route('validate-comment')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$comment->id}}" required readonly name="comment_id" />
                            <button class="btn btn-sm btn-success" type="submit">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $('#commentStatusRadios input[name="commentStatusChoice"]').on('change', (e) => {
        console.log('change');
        location.href = $('#commentStatusRadios input[name="commentStatusChoice"]:checked').attr('href');
    });
</script>
@endsection