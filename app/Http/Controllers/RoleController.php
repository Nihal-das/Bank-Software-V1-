<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create()
    {
        $modules = Module::with('permissions')->get();

        return view('roles.create', ['modules' => $modules]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $role->permissions()->attach($request->permissions);

        return redirect()->back()->with('success', 'Role with permission created successfully');
    }

    public function show_all()
    {
        $roles = Role::orderBy('name')->get();
        return view('roles.show_all', compact('roles'));
    }

    public function show(Role $role)
    {

        return view('roles.show',  ['role' => $role]);
    }

    public function edit(Role $role)
    {
        $modules = Module::with('permissions')->get();

        return view('roles.edit', ['role' => $role, 'modules' => $modules]);
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'permission' => 'array'
        ]);

        $role->update($validated);

        $role->permissions()->sync($request->permissions ?? []);

        return redirect()->back()->with('success', 'Role updated successfully');
    }

    public function delete(Role $role)
    {
        $role->permissions()->detach();

        $role->delete();

        return redirect('/roles/view_all')->with('success', 'Role deleted successfully');
    }
}
