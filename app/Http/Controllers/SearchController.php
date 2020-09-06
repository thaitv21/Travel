<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Place;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPost(PostRequest $request)
    {
        $result= Place::where('place_name', 'LIKE', "%{$request->input('query')}%")->get();

        return response()->json($result);
    }
}
