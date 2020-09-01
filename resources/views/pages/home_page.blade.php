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
                                <input type="text" placeholder="{{ trans('header.search_input') }}">
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit" >{{ trans('header.search_button') }}</button>
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
                        <div class="col-lg-4 col-md-6">
                            <div class="single_trip home-post">
                                <div class="thumb img-post-home">
                                    <img src="{{ asset($post->images->first()->url) }}" alt="">
                                </div>
                                <div class="info margin-left-avt">
                                    <div class="date">
                                        <span><i class="far fa-calendar-alt"></i>{{ $post->created_at->format(' d, M, Y') }}</span>
                                    </div>
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <h3>{{ $post->title }}</h3>
                                    </a>
                                    <span>
                                        @if ($post->user->avatar == NULL)
                                            <img src="{{ asset(config('constains.avatar')) }}" 
                                                class="avt-img" id="avt-img"></label>
                                        @else
                                            <img src="{{ asset($post->user->avatar) }}" 
                                                class="avt-img" alt="{{ trans('profile.user_avt') }}" id="avt-img"></label>
                                        @endif
                                        {{ $post->user->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->
@endsection
