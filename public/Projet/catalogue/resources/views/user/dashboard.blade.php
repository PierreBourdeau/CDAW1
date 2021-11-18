@extends('layout')

@section('content')
<div class="d-flex flex-fill flex-column py-5 px-4 container-lg" style="min-height: 0px;overflow-y: auto;">
    <div class="row">
        <div class="col-md">
            <div class="feature-icon bg-primary bg-gradient">
                <i class="fas fa-user"></i>
            </div>
            <h2>{{__('Profile settings')}}</h2>
            <p>{{__('Change your profile settings like : username, personal informations, profile picture...')}}</p>
            <a href="#">{{__('Change settings')}} ></a>
        </div>
    </div>
    <form action="{{route('user-profile-update')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex justify-content-center">
                <label for="photo" class="position-relative rounded-circle profile-pic-label" style="overflow: hidden;">
                    <div class="profile-pic-hover text-center">
                        <i class="text-light fas fa-pencil-alt"></i>
                    </div>
                    @if (isset($user->photo))
                    <img src="{{$user->photo}}" class="rounded-circle" height="77" width="77" />
                    @else
                    <img src="{{asset('default_profile.jpg');}}" class="rounded-circle" height="77" width="77" />
                    @endif
                    <input accept="image/*" type="file" id="photo" class="d-none" name="photo" />
                </label>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="usernameInput" class="form-label">{{__('Username')}}</label>
                <input required type="text" name="username" id="usernameInput" class="form-control"
                    placeholder="Username" aria-label="User name" value="{{$user->username}}">
                @if ($errors->has('username'))
                <p class="text-danger mb-0 mt-2">{{$errors->first('username')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">{{__('Email')}}</label>
                <input required type="text" name="email" id="emailInput" class="form-control" placeholder="Email"
                    aria-label="email" value="{{$user->email}}">
                @if ($errors->has('email'))
                <p class="text-danger mb-0 mt-2">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="fnameInput" class="form-label">{{__('First name')}}</label>
                    <input id="fnameInput" required type="text" name="fname" class="form-control"
                        placeholder="First name" aria-label="First name" value="{{$user->fname}}">
                    @if ($errors->has('fname'))
                    <p class="text-danger mb-0 mt-2">{{$errors->first('fname')}}</p>
                    @endif
                </div>
                <div class="col">
                    <label for="lnameInput" class="form-label">{{__('Last name')}}</label>
                    <input id="lnameInput" required type="text" name="lname" class="form-control"
                        placeholder="Last name" aria-label="Last name" value="{{$user->lname}}">
                    @if ($errors->has('lname'))
                    <p class="text-danger mb-0 mt-2">{{$errors->first('lname')}}</p>
                    @endif
                </div>
            </div>
        </div>
    </form>
    <div class="row py-5">
        <div class="col-md">
            <div class="feature-icon bg-primary bg-gradient">
                <i class="fas fa-key"></i>
            </div>
            <h2>{{__('Secret infos settings')}}</h2>
            <p>{{__('Change your password...')}}</p>
            <a href="#">{{__('Change password')}} ></a>
        </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="oldPasswordInput" class="form-label">{{__('Old password')}}</label>
            <input required type="password" name="oldPassword" id="oldPasswordInput" class="form-control"
                placeholder="Old password" aria-label="Old password">
            @if ($errors->has('oldPassword'))
            <p class="text-danger mb-0 mt-2">{{$errors->first('oldPassword')}}</p>
            @endif
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="passwordInput" class="form-label">{{__('Password')}}</label>
            <input id="passwordInput" required type="password" name="password" class="form-control"
                placeholder="Password" aria-label="Password">
            @if ($errors->has('password'))
            <p class="text-danger mb-0 mt-2">{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="col">
            <label for="password_confirmationInput" class="form-label">{{__('Password confirmation')}}</label>
            <input id="password_confirmationInput" required type="password" name="password_confirmation"
                class="form-control" placeholder="{{__('Confirm password')}}" aria-label="Password confirmation">
            @if ($errors->has('password_confirmation'))
            <p class="text-danger mb-0 mt-2">{{$errors->first('password_confirmation')}}</p>
            @endif
        </div>
    </div>
</div>
@endsection