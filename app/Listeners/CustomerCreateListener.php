<?php

namespace App\Listeners;

use App\Events\CustomerCreaetEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CustomerCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerCreaetEvent $event)
    {
        // Access the customer from the event
        $customer = $event->customer;

        return back()->with('success', 'Customer created: ' . $customer->name);
    }
}
