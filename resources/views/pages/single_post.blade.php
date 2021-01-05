@extends('home')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/edit_profile.css') }}">
@endsection
@section('content')
    <div class="bradcam_area" style="background-image: url({{asset($post->images->first()->url)}})" id="title_img">
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
    <div class="media container text-align-center margin-left-avt align-items-center pl-0 mt-10">
        @if ($post->user->avatar == NULL)
            <img width="50" height="50" src="{{ asset(config('constains.avatar')) }}"
                 class="avt-img-header margin-left-avt" id="avt-img"></label>
        @else
            <img width="50" height="50" src="{{ asset($post->user->avatar) }}"
                 class="avt-img-header margin-left-avt" alt="{{ trans('profile.user_avt') }}" id="avt-img"></label>
        @endif
        <span class="font-weight-bold mb-0 mr-5 text-align-center margin-left-avt">{{ $post->user->name }}</span>
        <span class="text-align-center"><i class="fas fa-map-marker-alt"></i><span> </span>{{ $post->place->place_name }}, {{ $post->place->province->prov_name }}</span>
    </div>
    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset($img_2) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $post->intro }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i>{{ trans('profile.comment') }}</a></li>
                                <li><i class="far fa-calendar-alt "></i>{{ $post->created_at->format('d/m/Y, H:i a') }}
                                </li>
                            </ul>
                            <p class="excert">{{ $post->content}}</p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info">
                                @if (Auth::check())
                                    <a href="{{ route('like', $post->id) }}" class="col-lg-2"><i
                                            class="fas fa-thumbs-up">
                                        </i>&nbsp;{{ count($post->likes) }}
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="col-lg-2"><i class="fas fa-thumbs-up">
                                        </i>&nbsp;{{ count($post->likes) }}
                                    </a>
                                @endif
                            </p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{ $countComment->count() }}  {{ trans('profile.comment') }}</h4>
                        @foreach ($post->comments as $comment)
                            @if ($comment->parent_id == NULL)
                                @if ($comment->status == config('constains.show'))
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    @if($comment->user->avatar == NULL)
                                                        <img width="30" height="30" src="{{ asset(config('constains.avatar')) }}" alt="">
                                                    @else
                                                        <img width="30" height="30" src="{{ asset($comment->user->avatar) }}" alt="">
                                                    @endif
                                                </div>
                                                <div class="desc">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h5>
                                                                <a href="#">{{ $comment->user->name }}</a>
                                                            </h5>
                                                            <p class="date">{{ $comment->created_at->format('M d, Y H:i a') }}</p>
                                                            @if (Auth::id() == $comment->user->id)
                                                                <form
                                                                    action="{{ route('comments.destroy', $comment->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn" id="delete-btn"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            @endif
                                                            @if (Auth::check())
                                                                @if (Auth::user()->role_id == config('constains.is_admin'))
                                                                    @if ($comment->status == config('constains.show'))
                                                                        <a href="{{ route('hidden_cmt', $comment->id) }}"
                                                                           class="margin-left-avt">
                                                                            <i class="fas fa-eye"></i></a>
                                                                    @else
                                                                        <a href="{{ route('hidden_cmt', $comment->id) }}"
                                                                           class="margin-left-avt">
                                                                            <i class="fas fa-eye-slash"></i></a>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <p class="comment">
                                                        {{ $comment->comment }}
                                                    </p>
                                                    <div>
                                                        <form method="post" action="{{ route('reply') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" name="comment" class="form-control"/>
                                                                <input type="hidden" name="post_id"
                                                                       value="{{ $post->id }}"/>
                                                                <input type="hidden" name="parent_id"
                                                                       value="{{ $comment->id }}"/>
                                                            </div>
                                                            @if (Auth::check())
                                                                <div class="form-group">
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{ Auth::id() }}">
                                                                    <input type="submit" class="btn btn-primary"
                                                                           value="{{ trans('post.reply') }}"/>
                                                                </div>
                                                            @else
                                                                <div class="form-group">
                                                                    <a class="btn btn-primary"
                                                                       href="{{ route('login') }}">{{ trans('post.reply') }}</a>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                    @include('pages.comment', ['comments' => $comment->replies])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif (Auth::check())
                                    @if (Auth::user()->role_id == config('constains.is_admin'))
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        @if($comment->user->avatar == NULL)
                                                            <img width="30" height="30" src="{{ asset(config('constains.avatar')) }}" alt="">
                                                        @else
                                                            <img width="30" height="30" src="{{ asset($comment->user->avatar) }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <h5>
                                                                    <a href="#">{{ $comment->user->name }}</a>
                                                                </h5>
                                                                <p class="date">{{ $comment->created_at->format('M d, Y H:i a') }}</p>
                                                                @if (Auth::id() == $comment->user->id)
                                                                    <form
                                                                        action="{{ route('comments.destroy', $comment->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn"
                                                                                id="delete-btn"><i
                                                                                class="fas fa-trash-alt"></i></button>
                                                                    </form>
                                                                @endif
                                                                @if (Auth::user()->role_id == config('constains.is_admin'))
                                                                    @if ($comment->status == config('constains.show'))
                                                                        <a href="{{ route('hidden_cmt', $comment->id) }}"
                                                                           class="margin-left-avt">
                                                                            <i class="fas fa-eye"></i></a>
                                                                    @else
                                                                        <a href="{{ route('hidden_cmt', $comment->id) }}"
                                                                           class="margin-left-avt">
                                                                            <i class="fas fa-eye-slash"></i></a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <p class="comment">
                                                            {{ $comment->comment }}
                                                        </p>
                                                        <div>
                                                            <form method="post" action="{{ route('reply') }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="text" name="comment"
                                                                           class="form-control"/>
                                                                    <input type="hidden" name="post_id"
                                                                           value="{{ $post->id }}"/>
                                                                    <input type="hidden" name="parent_id"
                                                                           value="{{ $comment->id }}"/>
                                                                </div>
                                                                @if (Auth::check())
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="user_id"
                                                                               value="{{ Auth::id() }}">
                                                                        <input type="submit" class="btn btn-primary"
                                                                               value="{{ trans('post.reply') }}"/>
                                                                    </div>
                                                                @else
                                                                    <div class="form-group">
                                                                        <a class="btn btn-primary"
                                                                           href="{{ route('login') }}">{{ trans('post.reply') }}</a>
                                                                    </div>
                                                                @endif
                                                            </form>
                                                        </div>
                                                        @include('pages.comment', ['comments' => $comment->replies])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="comment-form">
                        <h4>{{ trans('post.cmt') }}</h4>
                        <form class="form-contact comment_form" action="{{ route('comments.store') }}" id="commentForm"
                              method="POST">
                            @csrf
                            <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" cols="30" rows="9"
                                      placeholder="Write Comment"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                            </div>
                            @if (Auth::check())
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <button type="submit"
                                            class="button button-contactForm btn_1 boxed-btn">{{ trans('post.btn_send') }}</button>
                                </div>
                            @else
                                <div class="form-group">
                                    <a class="button button-contactForm btn_1 boxed-btn"
                                       href="{{ route('login') }}">{{ trans('post.btn_send') }}</a>
                                </div>
                            @endif
                        </form>
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

@endsection
@section('script')
    <script src="{{ mix('js/all.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/profile.js') }}"></script>
@endsection
