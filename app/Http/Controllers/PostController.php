<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Province;
use App\Models\Post;
use App\Models\Image;
use App\Models\Place;
use App\Models\User;
use App\Models\Comment;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = User::with('posts')->find(Auth::id());

        return view('pages.profiles.mypost', compact('user'));
    }

    public function create()
    {
        $provinces = Province::all();

        return view('pages.create_post', compact('provinces'));
    }

    public function store(PostRequest $request)
    {
        $place = Place::create([
            'place_name' => $request->place,
            'province_id' => $request->prov_list,
        ]);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->intro = $request->intro;
        $post->content = $request->content;
        $post->status = config('constains.show');

        $place->posts()->save($post);
        if ($request->hasFile('images')) {
            $file_images = $request->file('images');
            foreach ($file_images as $file_image) {
                $filename = $file_image->getClientOriginalName();
                $name = preg_replace('/\s+/', '_', $filename);
                $url = $file_image->move('Upload_Img', $name);;
                $image = new Image([
                    'url' => $url,
                ]);

                $post->images()->save($image);
            }
        }

        return redirect()->route('posts.index')->with('success', trans('profile.success_mess'));
    }

    public function show($id)
    {
        try {
            $post = Post::with('images')->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        $provinces = Province::all();
        foreach ($post->comments as $comment) {
            if ($comment->status == config('constains.hidden')) {
                foreach ($comment->replies as $reply) {
                    $reply->status = config('constains.hidden');
                    $reply->update();
                }
            }
        }
        $img_2 = '';
        foreach ($post->images as $image) {
            if ($image->url != $post->images->first()->url) {
                $img_2 = $image->url;
            }
        }
        $countComment = Comment::where([
            ['post_id', $id],
            ['status', config('constains.show')],
        ])->get();

        return view('pages.single_post', compact('post', 'provinces', 'countComment', 'img_2'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $provinces = Province::all();

        return view('pages.edit_post', compact('post', 'provinces'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->intro = $request->intro;
        $post->content = $request->content;

        $post->place->place_name = $request->place;
        $post->place->province_id = $request->prov_list;

        if ($request->hasFile('images')) {
            $file_images = $request->file('images');
            foreach ($file_images as $file_image) {
                $filename = $file_image->getClientOriginalName();
                $name = preg_replace('/\s+/', '_', $filename);
                $url = $file_image->move('Upload_Img', $name);;
                $image = new Image([
                    'url' => $url,
                ]);

                $post->images()->save($image);
            }
        }
        $post->push();

        return redirect()->back()->with('success', trans('profile.success_mess'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', trans('profile.success_delete'));
    }
}
