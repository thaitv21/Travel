<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;

class LikeController extends Controller
{
    public function addLike($id)
    {
        try {
            $post = Post::findOrFail($id);            
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        $check = Like::where([
            ['user_id', Auth::id()],
            ['post_id', $id],
        ])->first();

        if ($check == null) {
            $like = Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
            ]);
        } else {
            $check->delete();
        }

        return redirect()->back();
    }
}
