@foreach ($comments as $comment)
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="{{ asset($comment->user->avatar) }}" alt="">
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
@endforeach  
