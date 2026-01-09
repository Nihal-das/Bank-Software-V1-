<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // Show form
    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        return view('transactions.create', compact('customers'));
    }

    // Save transaction
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type'        => 'required|in:DEPOSIT,WITHDRAW',
            'amount'      => 'required|numeric|min:1',
            'mode'        => 'required|in:CASH,BANK',
        ]);

        //Check balance BEFORE transaction
        if ($request->type === 'WITHDRAW') {

            $balance = Entry::where('account_type', 'CUSTOMER')
                ->where('account_id', $request->customer_id)
                ->sum('credit')

                -

                Entry::where('account_type', 'CUSTOMER')
                ->where('account_id', $request->customer_id)
                ->sum('debit');

            if ($balance < $request->amount) {
                return back()
                    ->withInput()
                    ->with('error', 'Insufficient balance for withdrawal');
            }
        }

        if (
            $request->type === 'DEPOSIT' &&
            $request->amount > 100000
        ) {

            if (!Auth::user()->hasPermission('High Deposit')) {
                abort(403, 'You are not allowed to make high-value deposits.');
            }
        }

        DB::transaction(function () use ($request) {

            $tx = Transaction::create([
                'customer_id' => $request->customer_id,
                'type'        => $request->type,
                'remarks'     => $request->type . ' Transaction',
            ]);

            if ($request->type === 'DEPOSIT') {

                Entry::create([
                    'transaction_id' => $tx->id,
                    'account_type'   => $request->mode,
                    'debit'          => $request->amount,
                    'credit'         => 0,
                ]);

                Entry::create([
                    'transaction_id' => $tx->id,
                    'account_type'   => 'CUSTOMER',
                    'account_id'     => $request->customer_id,
                    'debit'          => 0,
                    'credit'         => $request->amount,
                ]);
            }

            if ($request->type === 'WITHDRAW') {

                Entry::create([
                    'transaction_id' => $tx->id,
                    'account_type'   => $request->mode,
                    'debit'          => 0,
                    'credit'         => $request->amount,
                ]);

                Entry::create([
                    'transaction_id' => $tx->id,
                    'account_type'   => 'CUSTOMER',
                    'account_id'     => $request->customer_id,
                    'debit'          => $request->amount,
                    'credit'         => 0,
                ]);
            }
        });

        return redirect()
            ->route('transactions.create')
            ->with('success', 'Transaction recorded');
    }
}
