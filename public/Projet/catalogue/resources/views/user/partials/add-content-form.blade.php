@if ($name == 'movie')
<form id="editMediaForm" method="POST" enctype="multipart/form-data" action="{{route('media-create')}}">
  @csrf
  <input type="hidden" name="type" value="Movie" readonly />
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
  <div class="mb-3">
    <label for="lengthInput" class="form-label">{{__('Length')}}</label>
    <input required type="text" name="length" class="form-control" id="lengthInput" placeholder="{{__('Enter length')}}"
      value="{{Request::old('length')}}">
    @if ($errors->has('length'))
    <p class="text-danger mb-0 mt-2">{{$errors->first('length')}}</p>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>

</form>
@elseif ($name == 'serie')
<form>
  <h1>{{__('Serie')}}</h1>
  <div class="mb-3">
    <label for="titleInput" class="form-label">{{__('Title')}}</label>
    <input type="text" class="form-control" id="titleInput" placeholder="{{__('Enter Title')}}">
  </div>
  <div class="mb-3">
    <label for="yearInput" class="form-label">{{__('Year')}}</label>
    <input type="text" class="form-control" id="yearInput" placeholder="{{__('Enter Year')}}">
  </div>
  <div class="mb-3">
    <label for="authorInput" class="form-label">{{__('Director')}}</label>
    <input type="text" class="form-control" id="authorInput" placeholder="{{__('Enter Director')}}">
  </div>
  <div class="mb-3">
    <label for="castInput" class="form-label">{{__('Cast')}}</label>
    <input type="text" class="form-control" id="castInput" placeholder="{{__('Enter Cast')}}">
  </div>
  <div class="mb-3">
    <label for="castInput" class="form-label">{{__('Season')}}</label>
    <input type="text" class="form-control" id="castInput" placeholder="{{__('Enter Season')}}">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">{{__('Select Image')}}</label>
    <input class="form-control" type="file" id="formFile">
  </div>

  <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>

</form>
@else
<form>
  <h1>{{__('Book')}}</h1>
  <div class="mb-3">
    <label for="titleInput" class="form-label">{{__('Title')}}</label>
    <input type="text" class="form-control" id="titleInput" placeholder="{{__('Enter Title')}}">
  </div>
  <div class="mb-3">
    <label for="yearInput" class="form-label">{{__('Year')}}</label>
    <input type="text" class="form-control" id="yearInput" placeholder="{{__('Enter Year')}}">
  </div>
  <div class="mb-3">
    <label for="authorInput" class="form-label">{{__('Author')}}</label>
    <input type="text" class="form-control" id="authorInput" placeholder="{{__('Enter Author')}}">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">{{__('Select Image')}}</label>
    <input class="form-control" type="file" id="formFile">
  </div>

  <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>

</form>

@endif