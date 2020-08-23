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
        $credentials = array(
            'email' => $request->email, 
            'password' => $request->password
        );
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        else {
            return redirect()->back()->with('error_login', trans('login.error_login'));
        }
    }

    public function postLogout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
