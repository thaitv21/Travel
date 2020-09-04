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
            'status' => config('constains.show'),
        ];
        $isUser = [
            'email' => $request->email, 
            'password' => $request->password,
            'role_id' => config('constains.is_user'),
            'status' => config('constains.show'),
        ];
        $isUserHide = [
            'email' => $request->email, 
            'password' => $request->password,
            'role_id' => config('constains.is_user'),
            'status' => config('constains.hidden'),
        ];
        if (Auth::attempt($isUser)) {
            return redirect()->route('home');
        } elseif (Auth::attempt($isUserHide)) {
            return redirect()->back()->with('error_login', trans('login.error_lock'));
        } elseif (Auth::attempt($isAdmin)) {
            return redirect()->route('users');
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
