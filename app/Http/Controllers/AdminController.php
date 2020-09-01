<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AdminController extends Controller
{
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
}
