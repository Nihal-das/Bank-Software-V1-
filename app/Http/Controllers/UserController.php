<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', Password::min(6), 'confirmed'],
        ]);
        
        $attributes['role_id'] = $request->role_id;

        User::create($attributes);

        return back()->with('success', 'User created successfully');
    }
}
