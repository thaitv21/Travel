@extends('home')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/all.css') }}"> 
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/edit_profile.css') }}">   
@endsection
@section('content')
<div class="bradcam_area" data-background="{{ asset($post->images->first()->url) }}" id="title_img">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->intro }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="media mx-auto text-align-center margin-left-avt">
    @if ($post->user->avatar == NULL)
        <img src="{{ asset(config('constains.avatar')) }}" 
            class="avt-img-header margin-left-avt" id="avt-img"></label>
    @else
        <img src="{{ asset($post->user->avatar) }}" 
            class="avt-img-header margin-left-avt" alt="{{ trans('profile.user_avt') }}" id="avt-img"></label>
    @endif
    <h4 class="font-weight-bold mb-4 text-align-center margin-left-avt">{{ $post->user->name }}</h4>                               
    <span class="text-align-center"><i class="fas fa-map-marker-alt"></i><span> </span>{{ $post->place->place_name }}, {{ $post->place->province->prov_name }}</span>
</div>
<section class="blog_area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset($post->images()->latest()->first()->url) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $post->intro }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i>{{ trans('profile.comment') }}</a></li>
                                <li><i class="far fa-calendar-alt "></i>{{ $post->created_at->format('d/m/Y, H:i a') }}</li>
                            </ul>
                            <p class="excert">{{ $post->content}}</p>
                        </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><a href="" class="col-lg-2"><i class="fas fa-thumbs-up"></i>{{ trans('profile.like') }}</a></p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">                        
                        </div>
                    </div>                 
                </div>
                <div class="comments-area">
                    <h4>{{ trans('profile.comment') }}</h4>
                    <div class="comment-list">
                        
                    </div>         
                </div>               
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">{{ trans('profile.province') }}</h4>
                        <ul class="list cat-list">
                            @foreach ($provinces as $province)
                                @if (count($province->places) > 0)
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>{{ $province->prov_name }}</p>                                                
                                            <p>({{ count($province->places)  }})</p>
                                        </a>
                                    </li>
                                @endif
                            @endforeach                
                        </ul>
                    </aside>                              
                </div>
            </div>
        </div>
    </div>
</section>

@yield('profile')
@endsection
@section('script')
    <script src="{{ mix('js/all.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/profile.js') }}"></script>   
@endsection
