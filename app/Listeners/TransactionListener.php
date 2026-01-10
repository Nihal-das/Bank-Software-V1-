<?php

namespace App\Listeners;

use App\Events\TransactionEvent;
use App\Models\Entry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionListener
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
    public function handle(TransactionEvent $event)
    {
        $transaction = $event->transaction;
        $entry = $event->entry;

        $amount = $entry->debit > 0
            ? $entry->debit
            : $entry->credit;

        // Perform actions based on the transaction
        return back()->with('success', 'Transaction processed: ' . strtolower($transaction->type) . ' amount: ' . $amount);
    }
}
