<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->limit(config('constains.posts_list'))->get();
        $feature_posts = Post::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->limit(config('constains.posts_list'))
            ->get();

        return view('pages.home_page', compact('posts', 'feature_posts'));
    }

    public function experience()
    {
        $posts = Post::latest()->get();
        $title = trans('home_page.travel');
        $intro = trans('home_page.reviewing');

        return view('pages.experience', compact('posts', 'title', 'intro'));
    }

    public function hotReview()
    {
        $posts = Post::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->get();
        $title = trans('home_page.fea_post');
        $intro = trans('home_page.good_articles');    

        return view('pages.experience', compact('posts', 'title', 'intro'));
    }
}
