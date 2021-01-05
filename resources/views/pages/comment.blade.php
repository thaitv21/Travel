@foreach ($comments as $comment)
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
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" id="delete-btn"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            @endif
                            @if (Auth::check())
                                @if (Auth::user()->role_id == config('constains.is_admin'))
                                    @if ($comment->status == config('constains.show'))
                                        <a href="{{ route('hidden_cmt', $comment->id) }}" class="margin-left-avt">
                                            <i class="fas fa-eye"></i></a>
                                    @else
                                        <a href="{{ route('hidden_cmt', $comment->id) }}" class="margin-left-avt">
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
                                <input type="text" name="comment" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                            </div>
                            @if (Auth::check())
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="submit" class="btn btn-primary" value="{{ trans('post.reply') }}"/>
                                </div>
                            @else
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{{ route('login') }}">{{ trans('post.reply') }}</a>
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
@if (Auth::check())
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
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" id="delete-btn"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            @endif
                            @if (Auth::user()->role_id == config('constains.is_admin'))
                                @if ($comment->status == config('constains.show'))
                                    <a href="{{ route('hidden_cmt', $comment->id) }}" class="margin-left-avt">
                                        <i class="fas fa-eye"></i></a>
                                @else
                                    <a href="{{ route('hidden_cmt', $comment->id) }}" class="margin-left-avt">
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
                                <input type="text" name="comment" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                            </div>
                            @if (Auth::check())
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="submit" class="btn btn-primary" value="{{ trans('post.reply') }}"/>
                                </div>
                            @else
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{{ route('login') }}">{{ trans('post.reply') }}</a>
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
@endforeach
