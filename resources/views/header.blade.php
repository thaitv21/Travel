<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('bower_components/review_travel/img_travel/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="#" href="{{ route('home') }}">{{ trans('header.home') }}</a></li>
                                        <li><a href="{{ route('places') }}">{{ trans('header.places') }}</a></li>
                                        <li><a class="" href="{{ route('new_review') }}">{{ trans('header.experience') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                @if (Auth::check())
                                    <div class="number">
                                        <a href="{{ route('posts.create') }}"><i class="fa fa-plus-circle"></i> {{ trans('header.create_post') }} </a>
                                    </div>
                                @else
                                    <div class="number">
                                        <a href="{{ route('login') }}"><i class="fa fa-plus-circle"></i> {{ trans('header.create_post') }} </a>
                                    </div>
                                @endif
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-bell"></i> </a></li>
                                        @if (Auth::check())
                                            <li>
                                                @if (Auth::user()->avatar == NULL)
                                                    <img width="50" height="50" src="{{ asset(config('constains.avatar')) }}"
                                                        class="avt-img-header margin-left-avt " alt="{{ trans('profile.user_avt') }}"></label>
                                                @else
                                                    <img width="50" height="50" src="{{ asset(Auth::user()->avatar) }}"
                                                        class="avt-img-header margin-left-avt " alt="{{ trans('profile.user_avt') }}"></label>
                                                @endif
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="{{ route('login') }}" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }}</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    @if (Auth::user()->role_id == config('constains.is_admin'))
                                                        <a class="dropdown-item" href="{{ route('users') }}">{{ trans('profile.admin_page') }}</a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{ route('posts.index') }}">{{ trans('profile.my_posts') }}</a>
                                                    <a class="dropdown-item" href="{{ route('profiles.index') }}">{{ trans('profile.edit_profile') }}</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>{{ trans('login.logout') }}</a>
                                                </div>
                                            </li>

                                        @else
                                            <li><a href="{{ route('login') }}">{{ trans('header.login') }} </a></li>
                                            <li><a href="{{ route('signup') }}"></i> {{ trans('login.signup_button') }} </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
