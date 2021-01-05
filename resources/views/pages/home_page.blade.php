@extends('home')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
@endsection
@section('content')
    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>{{ trans('header.search_input') }}</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="#">
                            <div class="input_field">
                                <input type="text" placeholder="{{ trans('header.search_input') }}" name="search"/>
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit">{{ trans('header.search_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->

    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>{{ trans('home_page.travel') }}</h3>
                        <p>{{ trans('home_page.reviewing') }}</p>
                    </div>
                </div>
            </div>
            <div class="recent_trip_area">
                <div class="row">
                    @foreach ($posts as $post)
                        @if ($post->status == config('constains.show'))
                            <div class="col-lg-4 col-md-6 margin-top">
                                <div class="single_trip home-post">
                                    <div class="thumb img-post-home">
                                        @if($post->images->first() != NULL)
                                            <img src="{{ asset($post->images->first()->url) }}" alt="">
                                        @else
                                            <img src="{{ asset('/images/no_image.png') }}">
                                        @endif
                                    </div>
                                    <div class="info margin-left-avt">
                                        <div class="date">
                                            <span><i class="far fa-calendar-alt"></i>
                                                {{ $post->created_at->format('d, M, Y') }}
                                            </span>
                                        </div>
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <p class="margin-top-user ">
                                            @if ($post->user->avatar == NULL)
                                                <img width="50" height="50"
                                                     src="{{ asset(config('constains.avatar')) }}"
                                                     class="avt-img" id="avt-img">
                                            @else
                                                <img
                                                    width="50" height="50" src="{{ asset($post->user->avatar) }}"
                                                    class="avt-img" alt="{{ trans('profile.user_avt') }}" id="avt-img">
                                            @endif
                                            {{ $post->user->name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row margin-top mt-30">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                            <a class="boxed-btn4"
                               href="{{ route('new_review') }}">{{ trans('home_page.more_review') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->
    <div class="popular_destination_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>{{ trans('home_page.fea_post') }}</h3>
                        <p>{{ trans('home_page.good_articles') }}</p>
                    </div>
                </div>
            </div>
            <div class="recent_trip_area">
                <div class="row">
                    @foreach ($feature_posts as $post)
                        @if ($post->status == config('constains.show'))
                            <div class="col-lg-4 col-md-6 margin-top">
                                <div class="single_trip home-post">
                                    <div class="thumb img-post-home">
                                        @if($post->images->first() != NULL)
                                            <img src="{{ asset($post->images->first()->url) }}" alt="">
                                        @else
                                            <img src="{{ asset('/images/no_image.png') }}">
                                        @endif
                                    </div>
                                    <div class="info margin-left-avt">
                                        <div class="date">
                                            <span><i class="far fa-calendar-alt"></i>
                                                {{ $post->created_at->format('d, M, Y') }}
                                            </span>
                                        </div>
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <p class="margin-top-user">
                                            @if ($post->user->avatar == NULL)
                                                <img width="50" height="50"
                                                     src="{{ asset(config('constains.avatar')) }}"
                                                     class="avt-img" id="avt-img">
                                            @else
                                                <img width="50" height="50" src="{{ asset($post->user->avatar) }}"
                                                     class="avt-img" alt="{{ trans('profile.user_avt') }}" id="avt-img">
                                            @endif
                                            {{ $post->user->name }}
                                            <a class="ml-5" href="{{ route('posts.show', $post->id) }}">
                                                <i class="fas fa-thumbs-up"></i> {{ count($post->likes) }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row mt-30 mb-30">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                            <a class="boxed-btn4"
                               href="{{ route('hot_review') }}">{{ trans('home_page.more_review') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
