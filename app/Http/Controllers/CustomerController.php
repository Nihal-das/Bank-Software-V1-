<?php

namespace App\Http\Controllers;

use App\Events\CustomerCreaetEvent;
use App\Models\Customer;
use App\Models\Entry;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $bankBalance = Entry::where('account_type', 'BANK')->sum('debit') -
            Entry::where('account_type', 'BANK')->sum('credit');

        $cashBalance = Entry::where('account_type', 'CASH')->sum('debit')
            - Entry::where('account_type', 'CASH')->sum('credit');

        return view('customers.index', compact('bankBalance', 'cashBalance'));
    }


    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|string|regex:/^[\p{L}\p{N}\p{P}\p{Z}]+$/u',
            'Phone' => 'required|digits:10'
        ]);

        Customer::create([
            'name' => $request->name,
            'phone_number' => $request->Phone,
            'account_number' => 'AC' . now()->format('YmdHis') . rand(100, 999)
        ]);

        event(new CustomerCreaetEvent(
            Customer::latest()->first()
        ));
        return redirect()->back();
    }

    // Show all customers
    public function show_all()
    {
        $customers = Customer::orderBy('name')->simplePaginate(6);
        return view('customers.show_all', compact('customers'));
    }


    public function show(Customer $customer)
    {
        $customerBalance = Entry::where('account_type', 'CUSTOMER')
            ->where('account_id', $customer->id)
            ->sum('credit')
            -
            Entry::where('account_type', 'CUSTOMER')
            ->where('account_id', $customer->id)
            ->sum('debit');

        return view('customers.show', compact('customer', 'customerBalance'));
    }

    public function edit_form(Customer $customer)
    {

        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Customer $customer, Request $request)
    {

        $request->validate([
            'name' => 'required|string|regex:/^[\p{L}\p{N}\p{P}\p{Z}]+$/u',
            'Phone' => 'required|digits:10',
        ]);

        $customer->update([
            'name' => $request->name,
            'phone_number' => $request->Phone,
        ]);

        return redirect()->back()->with('success', 'Customer Updated Successfully');
    }

    public function delete(Customer $customer)
    {
        $customerBalance = Entry::where('account_type', 'CUSTOMER')
            ->where('account_id', $customer->id)
            ->sum('credit')
            -
            Entry::where('account_type', 'CUSTOMER')
            ->where('account_id', $customer->id)
            ->sum('debit');

        if ($customerBalance != 0) {
            return back()->with('error', 'Cannot delete customer with balance amount non zero');
        }

        $customer->delete();

        return redirect()->route('customers.show_all')->with('success', 'Customer deleted successfully');
    }
}
