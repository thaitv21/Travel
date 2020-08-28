<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Place;

class ProvinceController extends Controller
{
    public function index() 
    {
        $provinces = Province::all();

        return view('pages.places', compact('provinces'));
    }
}
