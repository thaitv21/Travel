@extends('pages.profile')
@section('profile')
    @foreach($user->posts as $post)
        <div class="recent_trip_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class=" text-center">
                            <div class="single_trip">
                                <div class="thumb"> 
                                    <img src="{{ asset($post->images->first()->url) }}" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="info col-lg-9 row">
                        <div class="col-lg-12">                                 
                            <a href="#">
                                <h2>{{ $post->title }}</h2>
                            </a>
                        </div>                        
                        <a href="" class="col-lg-2"><i class="fas fa-thumbs-up"></i>{{ trans('profile.like') }}</a>
                        <a href="" class="col-lg-3"><i class="far fa-comments"></i>{{ trans('profile.comment') }}</a> 
                        <div class="date col-lg-7 ">                                 
                            <span><i class="far fa-calendar-alt"></i><span> </span>{{ $post->created_at->format('d/m/Y, H:i a') }}</span>
                        </div>
                        <a href="#" class="col-lg-12">
                            <p>{{ $post->intro }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
