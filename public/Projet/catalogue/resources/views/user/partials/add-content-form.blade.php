<form id="createMediaForm" method="POST" enctype="multipart/form-data" action="{{route('media-create')}}">
  @csrf
  <div class="mb-3">
    <label for="imageInput" class="form-label">{{__('Select Image')}}</label>
    <input class="form-control" type="file" name="image" id="imageInput" value="{{Request::old('image')}}">
    @if ($errors->has('image'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('image')}}</p>
    @endif
  </div>
  <div class="mb-3">
    <label for="titleInput" class="form-label">{{__('Title')}}</label>
    <input required type="text" class="form-control" name="title" id="titleInput" placeholder="{{__('Enter Title')}}"
      value="{{Request::old('title')}}" />
    @if ($errors->has('title'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('title')}}</p>
    @endif
  </div>
  <div class="mb-3">
    <label for="yearInput" class="form-label">{{__('Year')}}</label>
    <input required type="text" name="year" class="form-control" id="yearInput" placeholder="{{__('Enter Year')}}"
      value="{{Request::old('year')}}" />
    @if ($errors->has('year'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('year')}}</p>
    @endif
  </div>
  <div class="mb-3">
    <label for="creatorInput" class="form-label">{{__('Director')}}</label>
    <input required type="text" name="creator" class="form-control" id="creatorInput"
      placeholder="{{__('Enter Director')}}" value="{{Request::old('creator')}}" />
    @if ($errors->has('creator'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('creator')}}</p>
    @endif
  </div>
  <div class="mb-3">
    <label for="descriptionInput" class="form-label">{{__('Description')}}</label>
    <textarea required rows="6" name="description" class="form-control" placeholder="{{__('Description')}}"
      id="descriptionInput">{{Request::old('description')}}</textarea>
    @if ($errors->has('description'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('description')}}</p>
    @endif
  </div>
  <div class="mb-3">
    <label for="castInput" class="form-label">{{__('Cast')}}</label>
    <input required type="text" name="cast" class="form-control" id="castInput" placeholder="{{__('Enter Cast')}}"
      value="{{Request::old('cast')}}">
    @if ($errors->has('cast'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('cast')}}</p>
    @endif
  </div>
  @if ($name == 'movie')
  <input type="hidden" name="type" value="Movie" readonly required />
  <div class="mb-3">
    <label for="lengthInput" class="form-label">{{__('Length')}}</label>
    <input required type="text" name="length" class="form-control" id="lengthInput" placeholder="{{__('Enter length')}}"
      value="{{Request::old('length')}}">
    @if ($errors->has('length'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('length')}}</p>
    @endif
  </div>
  @elseif ($name == 'serie')
  <input type="hidden" name="type" value="Serie" readonly required />
  <div class="mb-3">
    <label for="seasonsInput" class="form-label">{{__('Seasons')}}</label>
    <input required type="number" min="1" name="seasons" class="form-control" id="seasonsInput"
      placeholder="{{__('Seasons')}}" value="{{Request::old('seasons')}}">
    @if ($errors->has('length'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('seasons')}}</p>
    @endif
  </div>
  @endif
  <div class="mb-3 d-flex flex-wrap">
    @foreach($tags as $key=>$tag)
    <input type="checkbox" class="btn-check" id="{{$key.'-'.$tag->name}}" autocomplete="off" name="tags[]"
      value="{{$tag->id}}">
    <label class="btn btn-outline-primary btn-sm tag_a" for="{{$key.'-'.$tag->name}}">{{$tag->name}}</label><br>
    @endforeach
  </div>
  <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>

</form>