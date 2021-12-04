@extends('layout')

@section('content')
<div class="d-flex flex-fill flex-column py-5 px-4 container-lg" style="min-height: 0px;overflow-y: auto;">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Comment')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $key=>$comment)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>@includeif('partials.comment', ['comment' => $comment])</td>
                <td>
                    <div class="d-flex">
                        <form action="{{route('delete-comment')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$comment->id}}" required readonly name="comment_id" />
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="fas fa-minus"></i>
                            </button>
                        </form>
                        <form action="{{route('validate-comment')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$comment->id}}" required readonly name="comment_id" />
                            <button class="btn btn-sm btn-success" type="submit">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection