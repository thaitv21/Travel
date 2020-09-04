<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsers()
    {
        $users = User::paginate(config('constains.paginate'));

        return view('admin_pages.users_list', compact('users'));
    }

    public function getPosts()
    {
        $posts = Post::paginate(config('constains.paginate'));

        return view('admin_pages.posts_list', compact('posts'));
    }

    public function getComments()
    {
        $comments = Comment::paginate(config('constains.paginate'));

        return view('admin_pages.comments_list', compact('comments'));
    }

    public function actionPost($id)
    {
        try {
            $post = Post::findOrFail($id);            
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        if ($post->status == config('constains.hidden')) {
            $post->status = config('constains.show');
            $post->update();

            return redirect()->route('posts')->with('success', trans('admin.success_show'));
        } else {
            $post->status = config('constains.hidden');
            $post->update();

            return redirect()->route('posts')->with('success', trans('admin.success_hidden'));
        }
        
    }

    public function actionComment($id)
    {
        try {
            $comment = Comment::findOrFail($id);            
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        if ($comment->status == config('constains.hidden')) {
            $comment->update(['status' => config('constains.show')]);

            return redirect()->back()->with('success', trans('admin.success_show'));
        } else {
            $comment->update(['status' => config('constains.hidden')]);

            return redirect()->back()->with('success', trans('admin.success_hidden'));
        }        
    }

    public function actionUser($id)
    {
        try {
            $user = User::findOrFail($id);            
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        if ($user->status == config('constains.hidden')) {
            $user->status = config('constains.show');
            $user->update();

            return redirect()->route('users')->with('success', trans('admin.success_unlock'));
        } else {
            $user->status = config('constains.hidden');
            $user->update();

            return redirect()->route('users')->with('success', trans('admin.success_lock'));
        }
    }
}
