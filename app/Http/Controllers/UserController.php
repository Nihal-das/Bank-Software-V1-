<?php

namespace App\Http\Controllers;

use App\Events\UserCreateEvent;
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

        event(new UserCreateEvent(
            User::latest()->first()
        ));

        return back();
    }


    public function show_all()
    {
        $users = User::with('role')
            ->where('id', '!=', Auth::id())  // dosen't show my account
            ->orderBy('name')
            ->simplePaginate(6);

        return view('users.view_all_users', ['users' => $users]);
    }

    public function destroy(User $user)
    {

        if ($user) {
            $user->delete();
            return back()->with('success', 'User deleted successfully');
        }

        return back()->with('error', 'No authenticated user found');
    }
}
