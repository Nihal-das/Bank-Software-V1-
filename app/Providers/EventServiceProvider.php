<?php

namespace App\Providers;

use App\Events\CustomerCreaetEvent;
use App\Events\TransactionEvent;
use App\Events\UserCreateEvent;
use App\Listeners\CustomerCreateListener;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;
use App\Listeners\StoreNavMenu;
use App\Listeners\TransactionListener;
use App\Listeners\UserCreateListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $listen = [
        Login::class => [
            StoreNavMenu::class,
        ],
    ];

    protected $listeners = [
        CustomerCreaetEvent::class => [
            CustomerCreateListener::class,
        ],

        UserCreateEvent::class => [
            UserCreateListener::class,
        ],

        TransactionEvent::class => [
            TransactionListener::class,
        ],
    ];
}
