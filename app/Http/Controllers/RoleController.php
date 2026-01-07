<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Show create role form
    public function create()
    {
        $modules = Module::with('permissions')->get();
        return view('roles.create', ['modules' => $modules]);
    }

    // Store new role with permissions
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'permissions' => 'array'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->has('permissions')) {
            $role->permissions()->attach($request->permissions);
        }

        return redirect()->back()->with('success', 'Role with permissions created successfully');
    }

    // Show all roles
    public function show_all()
    {
        $roles = Role::orderBy('name')->get();
        return view('roles.show_all', compact('roles'));
    }

    // Show single role
    public function show(Role $role)
    {
        return view('roles.show', ['role' => $role]);
    }

    // Edit role form
    public function edit(Role $role)
    {
        // Get all permissions with their module
        $permissions = Permission::with('module')->get();

        // Group permissions by module
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return $permission->module ? $permission->module->name : 'Unassigned';
        });

        // Get IDs of permissions the role already has
        $rolePermissionIds = $role->permissions->pluck('id')->toArray();

        return view('roles.edit', [
            'role' => $role,
            'groupedPermissions' => $groupedPermissions,
            'rolePermissionIds' => $rolePermissionIds,
        ]);
    }

    // Update role
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'permissions' => 'array' // fix key to match form
        ]);

        // Update name and description only
        $role->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Sync permissions
        $role->permissions()->sync($request->permissions ?? []);

        return redirect()->back()->with('success', 'Role updated successfully');
    }

    // Delete role
    public function delete(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('roles.view_all')->with('success', 'Role deleted successfully');
    }
}
