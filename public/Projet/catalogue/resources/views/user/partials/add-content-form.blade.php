@if ($name == 'movie')
<form>
    <h1>{{__('Movie')}}</h1>
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
  <label for="formFile" class="form-label">{{__('Select Image')}}</label>
  <input class="form-control" type="file" id="formFile">
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