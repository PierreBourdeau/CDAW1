@extends('layout')

@section('content')
    <div class="d-flex flex-fill " style="min-height: 0px;">
        @includeif('navbar-side')
        <div class="container-fluid flex-fill " style="overflow-y: auto; max-width: 30%;min-width: 0px;">
        </div>
        <button data-bs-toggle="button" class="btn btn-primary p-0 rounded-circle d-lg-none position-absolute" id="side-bar-expender"><i class="fas fa-angle-right"></i></button>
    </div>
@endsection
