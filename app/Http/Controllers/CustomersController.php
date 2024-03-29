<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index')
            ->with(compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $customer = Customer::create($request->input());
        if ($customer) {
            if ($request->ajax()) {
                return response()->json([
                    'type' => 'customer',
                    'data' => $customer
                ]);
            }
            session()->flash('success', 'Customer record was successfully created!');
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'type' => 'error',
                    'message' => 'Customer record could not be created. Please try again'
                ]);
            }
            session()->flash('error', 'Customer record could not be created. Please try again.');
            return back()->withInput();
        }
        return redirect()->route('customers.index');
    }


    public function show(Customer $customer)
    {
        return view('customers.view')
            ->with(compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('customers.edit')
            ->with(compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $updated = $customer->update($request->input());
        if ($updated) {
            session()->flash('success', 'Customer detail was successfully updated');
        } else {
            session()->flash('error', 'Customer detail could not be updated. please try again.');
            return back()->withInput();
        }
        return back();
    }

    public function destroy(Customer $customer)
    {
        session()->flash('info', 'Action not implemented yet!.');
        return back();
    }

}
