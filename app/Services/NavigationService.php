<?php

namespace App\Services;

use App\Models\Module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class NavigationService
{
    /**
     * Get modules with permissions for the currently logged-in user.
     *
     * @return Collection
     */
    public static function getModulesForUser(): Collection
    {
        $user = Auth::user();

        // Return empty if no user or no role
        if (!$user || !$user->role) {
            return collect();
        }

        // Get all permission IDs for the user's role
        $permissionIds = $user->role->permissions->pluck('id');

        // Return empty if the role has no permissions
        if ($permissionIds->isEmpty()) {
            return collect();
        }

        // Fetch modules that have at least one of these permissions
        return Module::with(['permissions' => function ($query) use ($permissionIds) {
                $query->whereIn('id', $permissionIds)
                      ->where('type', 1); // Only type 1 permissions (for example: menu)
            }])
            ->whereHas('permissions', function ($query) use ($permissionIds) {
                $query->whereIn('id', $permissionIds)
                      ->where('type', 1);
            })
            ->get();
    }
}
