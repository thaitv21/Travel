<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Province;
use App\Models\Post;
use App\Models\Image;
use App\Models\Place;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('posts')->find(Auth::id());

        return view('pages.profiles.mypost', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();

        return view('pages.create_post', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                $url = $file_image->move('Upload_Img', $filename);;
                $image = new Image([
                    'url' => $url,
                ]);

                $post->images()->save($image);
            }
        }

        return redirect()->route('home')->with('success', trans('profile.success_mess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
