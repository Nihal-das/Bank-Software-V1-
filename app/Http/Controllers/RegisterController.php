<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', Password::min(6), 'confirmed'],
        ]);

        $attributes['role_id'] = Role::where('name', 'ADMIN')->value('id'); // default role as admin

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/');
    }
}
