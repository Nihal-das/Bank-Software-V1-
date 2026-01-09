<?php

namespace App\Listeners;

use App\Services\NavigationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Cache;

class StoreNavMenu
{
    /**
     * Create the event listener.
     */
    public function __construct(protected NavigationService $navigationService) {}

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $modules = $this->navigationService
            ->getModulesForUser($event->user);

        Cache::put(
            'nav_modules_user_' . $event->user->id,
            $modules,
            now()->addHours(2)
        );
    }
}
