@extends('layout')

@section('content')
@php
$media_type = explode("\\", $media->media_type);
$type = array_pop($media_type);
@endphp
@if($type == 'Movie')
<div class="container-lg py-4">
    <h3>{{__('Edit movie')}}</h3>
    <form id="editMediaForm" method="POST" enctype="multipart/form-data" action="{{route('media-edit-form')}}">
        @csrf
        <input type="hidden" name="id" value="{{$media->id}}" readonly />
        <div class="mb-3">
            <label for="imageInput" class="form-label">{{__('Select Image')}}</label>
            <input class="form-control" type="file" id="imageInput" name="image">
        </div>
        <div class="mb-3">
            <label for="titleInput" class="form-label">{{__('Title')}}</label>
            <input required type="text" class="form-control" name="title" id="titleInput"
                placeholder="{{__('Enter Title')}}" value="{{$media->title}}" />
        </div>
        <div class="mb-3">
            <label for="yearInput" class="form-label">{{__('Year')}}</label>
            <input required type="text" name="year" class="form-control" id="yearInput"
                placeholder="{{__('Enter Year')}}" value="{{$media->year}}" />
        </div>
        <div class="mb-3">
            <label for="creatorInput" class="form-label">{{__('Director')}}</label>
            <input required type="text" name="creator" class="form-control" id="creatorInput"
                placeholder="{{__('Enter Director')}}" value="{{$media->creator}}" />
        </div>
        <div class="mb-3">
            <label for="descriptionInput" class="form-label">{{__('Description')}}</label>
            <textarea required rows="6" name="description" class="form-control" placeholder="{{__('Description')}}"
                id="descriptionInput">{{$media->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="castInput" class="form-label">{{__('Cast')}}</label>
            <input required type="text" name="cast" class="form-control" id="castInput"
                placeholder="{{__('Enter Cast')}}" value="{{$media->getMedia->cast}}">
        </div>
        <div class="mb-3">
            <label for="lengthInput" class="form-label">{{__('Length')}}</label>
            <input required type="text" name="length" class="form-control" id="lengthInput"
                placeholder="{{__('Enter length')}}" value="{{$media->getMedia->length}}">
        </div>
        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>

    </form>
</div>
@endif
@endsection