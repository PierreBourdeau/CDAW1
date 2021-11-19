@if ($name == 'movie')
<form>
    <h1>Movie</h1>
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