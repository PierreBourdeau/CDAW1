@if ($name == 'movie')
<form>
    <h1>Movie</h1>
  <div class="mb-3">
    <label for="titleInput" class="form-label">Movie Title</label>
    <input type="text" class="form-control" id="titleInput" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="authorInput" class="form-label">Author</label>
    <input type="text" class="form-control" id="authorInput">
  </div>
  <div class="mb-3">
    <label for="yearInput" class="form-label">Year</label>
    <input type="text" class="form-control" id="yearInput">
  </div>
  <div class="mb-3">
    <label for="castInput" class="form-label">Cast</label>
    <input type="text" class="form-control" id="castInput">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Movie Image</label>
  <input class="form-control" type="file" id="formFile">
</div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@elseif ($name == 'serie')
<form>
    <h1>Serie</h1>
</form>
@else
<form>
    <h1>Book</h1>
</form>

@endif