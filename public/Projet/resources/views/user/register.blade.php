@extends('user.layout')

@section('content')
<div class="d-flex h-100">
    <div class="col-6 d-none d-md-flex align-items-center"
        style="background-image: url(https://cdn.pixabay.com/photo/2016/04/14/13/06/landscape-1328858_1280.jpg);background-size: cover;background-position: center;">

    </div>
    <div class="container-fluid py-3">
        <div class="d-flex container-fluid align-items-center">
            <div class="d-flex flex-column justify-content-center flex-fill">
                <h3>Register</h3>
                <form id="registerForm">
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <input required type="text" name="first_name" class="form-control" placeholder="First name"
                                aria-label="First name">
                        </div>
                        <div class="col">
                            <input required type="text" name="last_name" class="form-control" placeholder="Last name"
                                aria-label="Last name">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <input required type="text" name="username" class="form-control" placeholder="Username"
                                aria-label="User name">
                        </div>
                        <div class="col">
                            <input class="form-control" aria-label="Birth date" name="birthDate" type="date"
                                placeholder="Date of birth" required="required" id="birthDateInput">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input required name="gender" class="form-check-input" type="radio"
                                name="inlineRadioOptions" id="inlineRadio1" value="men">
                            <label class="form-check-label" for="inlineRadio1">Men</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required name="gender" class="form-check-input" type="radio"
                                name="inlineRadioOptions" id="inlineRadio2" value="woman">
                            <label class="form-check-label" for="inlineRadio2">Woman</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required name="gender" class="form-check-input" type="radio"
                                name="inlineRadioOptions" id="inlineRadio3" value="other">
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <!--<label for="floatingInput">Email address</label>-->
                        <div class="form-floating">
                            <input required name="mail" type="email" class="form-control" id=" floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <!--<label for="floatingPassword">Password</label>-->
                        <div class="form-floating">
                            <input required name="password" type="password" class="form-control" id=" floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input required name="password_confirmation" type="password" class="form-control"
                                id=" floatingPasswordConfirm" placeholder="Password confirmation">
                            <label for="floatingPasswordConfirm">Confirm Password</label>
                        </div>
                    </div>
                    <div id="err_msg" class="text-danger"></div>
                    <div class="d-flex justify-content-center mb-5">
                        <button class="btn btn-primary" type="submit" id="registerSubmitBtn">Register</button>
                    </div>
                </form>
                <div class="d-flex flex-column">
                    <p>Already have an account ? </br><a style="cursor: pointer;" href="{{route('user.login')}}"
                            id="loginBtn"><strong class="theme-font-color">Sign In here!</strong></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection