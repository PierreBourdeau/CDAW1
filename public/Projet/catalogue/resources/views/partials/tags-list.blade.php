<div class="d-flex flex-wrap">
    @foreach($tags as $key=>$tag)
    <button data-tag="{{$tag->name}}" onclick="getTagSwiper(this)" type="button" class="tag_a btn btn-primary btn-sm"><i
            class="fas fa-plus"></i>
        {{$tag->name}}</button>
    @endforeach
</div>