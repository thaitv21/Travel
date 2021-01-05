@extends('home')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="section_title text-center mb_70">
                <h3>{{ $title }}</h3>
                <p>{{ $intro }}</p>
            </div>
        </div>
        <div class="col-lg-8">
            <ul class="blog-info-link mt-3 mb-4 section_title text-center">
                <li><a href="{{ route('new_review') }}"> {{ trans('home_page.new_review')}}</a></li>
                <li><a href="{{ route('hot_review') }}">{{ trans('home_page.hot_review')}}</a></li>
            </ul>
        </div>
    </div>
    @foreach($posts as $post)
        <div class="recent_trip_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 card-body my-post ">
                        <div class="col-lg-12">
                            <div class=" text-center">
                                <div class="single_trip">
                                    <div class="thumb">
                                        @if($post->images->first() != NULL)
                                            <img src="{{ asset($post->images->first()->url) }}" alt="">
                                        @else
                                            <img src="{{ asset('/images/no_image.png') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <h2>{{ $post->title }}</h2>
                            </a>
                        </div>
                        <div class="info col-lg-12 row ">
                            <a href="{{ route('posts.show', $post->id) }}" class="col-lg-1"><i class="fas fa-thumbs-up mr-1"></i>{{ count($post->likes) }}</a>
                            <a href="{{ route('posts.show', $post->id) }}" class="col-lg-3"><i class="far fa-comments mr-2"></i>{{ count($post->comments) }}{{ trans('profile.comment') }}</a>
                            <div class="date col-lg-4">
                                <span><i class="far fa-calendar-alt mr-1"></i><span> </span>{{ $post->created_at->format('d/m/Y, H:i a') }}</span>
                            </div>
                            @if (Auth::check())
                                @if (Auth::id() == $post->user->id)
                                    <div class="date col-lg-2">
                                        <a href="{{ route('posts.edit', $post->id) }}">
                                            <i class="fas fa-edit"></i>
                                            {{ trans('profile.edit_post') }}</a>
                                    </div>
                                    <div class="date col-lg-2">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn border-0" id="delete-btn" style="vertical-align: top; margin: 0; padding: 0; background: none;"><i class="fas fa-trash-alt mr-1"></i>{{ trans('profile.delete') }}</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
