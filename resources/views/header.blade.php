<header>  
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="bower_components/review_travel/img_travel/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="#" href="{{ route('home') }}">{{ trans('header.home') }}</a></li>
                                        <li><a href="#">{{ trans('header.places') }}</a></li>
                                        <li><a class="" href="#">{{ trans('header.experience') }}</a></l/li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                @if (Auth::check())
                                    <div class="number">
                                        <a href="{{ route('post.index') }}"><i class="fa fa-plus-circle"></i> {{ trans('header.create_post') }} </a>
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
                                            <li><a href="{{ route('login') }}"> {{ Auth::user()->name }} </a>
                                            <a href="{{ route('logout') }}">{{ trans('login.logout') }}</a>
                                            </li>
                                        @else
                                            <li><a href="{{ route('login') }}">{{ trans('header.login') }} </a></li>
                                            <li><a href="{{ route('signup') }}"></i> {{ trans('login.signup_button') }} </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
