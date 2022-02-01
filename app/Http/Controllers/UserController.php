<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->map(fn($user) => [
            'id'     => $user->id,
            'name'   => $user->name,
            'email'  => $user->email,
            'mobile' => $user->mobile,
        ]);
        return inertia('Users/index', [
            'users' => $users,
        ]);
    }

    public function show(User $user)
    {
        return inertia('Users/Show', [
            'user' => $user,
        ]);
    }

    public function update(User $user)
    {
        $attr = request()->validate([
            'name'   => ['required'],
            'email'  => ['required', 'email'],
            'avatar' => ['required'],
            'mobile' => ['required'],
        ]);

        $user->update($attr);

        return redirect('/users');
    }
}
