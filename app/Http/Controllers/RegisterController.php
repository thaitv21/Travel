<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function getSignUp()
    {
        return view('pages.sign_up');
    }

    public function postSignUp(RegisterRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = config('constains.is_user');
        $user->status = config('constains.show');
        $user->save();

        return redirect()->route('login');
    }
}
