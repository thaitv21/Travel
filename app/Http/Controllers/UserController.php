<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin_pages.add_user');
    }

    public function create()
    {
        //
    }

    public function store(RegisterRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = config('constains.is_user');
        $user->status = config('constains.show');
        $user->save();

        return redirect()->route('users')->with('success', trans('admin.add_success'));
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

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        return view('admin_pages.update_user', compact('user'));
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('users')->with('success', trans('admin.edit_success'));
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
