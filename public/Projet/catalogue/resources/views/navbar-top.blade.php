<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{route('front.index', ['content' => 'home']);}}"><img src="{{asset('play-button.png')}}"
                            alt="" width="30" height="30"></a>
                </li>
                @if (!empty($currentLang))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe-americas"></i> {{__('Language')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($langs as $key => $lang)
                        <li><a class="dropdown-item"
                                href="{{ route('changeLanguage', ['lang' => $lang->code]) }}">{{$lang->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
            </ul>
            <form class="d-flex me-auto ms-auto">
                <input class="form-control me-2" type="search" id="mediaSearchBar" placeholder="{{__('Search')}}"
                    aria-label="Search">
            </form>
            @guest
            <ul class="login navbar-nav mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('user.login')}}">{{__('Login')}}</a></li>
                <li class="nav-item d-none d-lg-block"><span class="nav-link">|</span></li>
                <li class="nav-item"><a class="nav-link" href="{{route('user-register')}}">{{__('Register')}}</a></li>
            </ul>
            @endguest
            @auth
            <ul class="login navbar-nav mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <div class="d-flex justify-content-center">
                        <div class="dropdown">
                            <a id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (isset($user->photo))
                                <img src="{{$user->photo}}" class="rounded-circle" height="24" width="24" />
                                @else
                                <img src="{{asset('default_profile.jpg');}}" class="rounded-circle" height="24"
                                    width="24" />
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start"
                                aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{route('user-dashboard')}}">{{__('Profile')}}</a>
                                </li>
                                <li><a class="dropdown-item" href="{{route('user-logout')}}">{{__('Logout')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="form-check form-switch d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                            checked>
                    </div>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>