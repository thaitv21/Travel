<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('pages.sign_in');
    }

    public function postLogin(LoginRequest $request)
    {
        $isAdmin = [
            'email' => $request->email, 
            'password' => $request->password,
            'role_id' => config('constains.is_admin'),
        ];
        $isUser = [
            'email' => $request->email, 
            'password' => $request->password,
            'role_id' => config('constains.is_user'),
        ];
        if (Auth::attempt($isAdmin)) {
            return redirect()->route('users');
        } elseif (Auth::attempt($isUser)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error_login', trans('login.error_login'));
        }
    }

    public function postLogout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
