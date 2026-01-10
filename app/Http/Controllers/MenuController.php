<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use App\Services\NavigationService;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

    public function refresh()
    {
        Cache::put(
            'nav_modules_user_' . Auth::id(),
            app(NavigationService::class)->getModulesForUser(Auth::user()),
            now()->addHours(2)
        );

        return redirect()->back()->with('success', 'Menu refreshed successfully');
    }
}


// ->away(url('/'));