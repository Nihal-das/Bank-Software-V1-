<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show()
    {
        return view('components.menu');
    }

    public function updateOrder(Request $request)
    {
        if ($request->has('modules')) {
            foreach ($request->modules as $moduleId => $order) {
                Module::where('id', $moduleId)
                    ->update(['sort_order' => $order]);
            }
        }

        // Update permissions order
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permissionId => $order) {
                Permission::where('id', $permissionId)
                    ->update(['sort_order' => $order]);
            }
        }

        return redirect()->back()->with('success', 'Menu order updated successfully!');
    }
}
