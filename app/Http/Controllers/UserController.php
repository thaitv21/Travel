<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\RegisterRequest;
use Hash;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return view('admin_pages.add_user');
    }

    public function store(RegisterRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => config('constains.is_user'),
            'status' => config('constains.show'),
        ];
        $this->userRepo->create($data);

        return redirect()->route('users')->with('success', trans('admin.add_success'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $user = $this->userRepo->find($id);

            return view('admin_pages.update_user', compact('user'));
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $this->userRepo->update($data, $id);

            return redirect()->route('users')->with('success', trans('admin.edit_success'));
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
    }

    public function destroy($id)
    {
        //
    }
}
