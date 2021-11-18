@extends('layout')

@section('content')
<div class="d-flex h-100">
    <div class="col-6 d-md-flex d-none align-items-center"
        style="background-image: url(https://cdn.pixabay.com/photo/2016/04/14/13/06/landscape-1328858_1280.jpg);background-size: cover;background-position: center;">

    </div>

    <div class="d-flex flex-column justify-content-center flex-fill p-3">
        <h3>Sign In</h3>
        <form id="loginForm" action="{{route('user.login.submit')}}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="form-floating">
                    <input required name="email" type="email" class="form-control" id="login_email_input"
                        placeholder="Email">
                    <label for="login_email_input">Email address</label>
                </div>
                @if ($errors->has('email'))
                <p class="text-danger mb-0 mt-2">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input required name="password" type="password" class="form-control" id="login_password_input"
                        placeholder="Password">
                    <label for="login_password_input">Password</label>
                </div>
                @if ($errors->has('password'))
                <p class="text-danger mb-0 mt-2">{{$errors->first('password')}}</p>
                @endif
            </div>
            <div id="err_msg" class="text-danger">
            </div>
            <div class="d-flex justify-content-center mb-3">
                <button class="btn btn-primary" id="loginSubmitBtn" type="submit">Sign In</button>
            </div>
        </form>
        <div class="d-sm-flex mb-3">
            <p>You are new ? <a style="cursor: pointer;" href="{{route('user-register')}}" id="registerBtn"><strong
                        class="theme-font-color">Register here!</strong></a></p>
        </div>
    </div>
    @endsection