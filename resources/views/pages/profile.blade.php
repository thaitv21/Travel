@extends('home')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/edit_profile.css') }}">
@endsection
@section('content')
<div class="ui-bg-cover ui-bg-overlay-container text-white bradcam_bg_4" id="image-of-title" style="display: none">
    <div class="ui-bg-overlay bg-dark opacity-50 "></div>
    <div class="container py-5">
        <div class="media mx-auto">
            @if (Auth::user()->avatar == NULL)
                <img src="{{ asset(config('constains.avatar')) }}"
                    class="avt-image rounded-circle" alt="User avatar" id="avt-img"></label>
            @else
                <img src="{{ Auth::user()->avatar }}"
                    class="avt-image rounded-circle" alt="{{ trans('profile.user_avt') }}" id="avt-img"></label>
            @endif
        </div>
        <div class="media-body card-user-avt">
            <h2 class="font-weight-bold text-white mb-4">{{ Auth::user()->name }}</h2>
        </div>
    </div>
</div>

<div class="ui-bg-overlay-container">
    <div class="">
        <ul class="nav nav-tabs tabs-alt justify-content-center">
            <li class="nav-item">
                @if($page == 1)
                    <a class="nav-link py-4 active" id="post" href="{{ route('posts.index') }}">{{ trans('profile.post') }}</a>
                @else
                    <a class="nav-link py-4" id="post" href="{{ route('posts.index') }}">{{ trans('profile.post') }}</a>
                @endif
            </li>
            <li class="nav-item">
                @if($page == 2)
                    <a class="nav-link py-4 active" id="edit" href="{{ route('profiles.index') }}">{{ trans('profile.edit_profile') }}</a>
                @else
                    <a class="nav-link py-4" id="edit" href="{{ route('profiles.index') }}">{{ trans('profile.edit_profile') }}</a>
                @endif
            </li>
        </ul>
    </div>
</div>
@yield('profile')
@endsection
@section('script')
    <script src="{{ asset('bower_components/review_travel/js_travel/profile.js') }}"></script>
@endsection
