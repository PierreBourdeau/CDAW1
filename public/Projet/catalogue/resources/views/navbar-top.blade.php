
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('front.index');}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            @if (!empty($currentLang))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-globe-americas"></i> {{__('Language')}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($langs as $key => $lang)
                                    <li><a class="dropdown-item" href='#'>{{$lang->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                        </ul>
                        <form class="d-flex me-auto ms-auto">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
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
                            <li class="nav-item"><a href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a></li>
                        </ul>
                        @endauth
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked>
                        </div>
                    </div>
                </div>
            </nav>