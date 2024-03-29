<?php

namespace App\Http\Controllers;


use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return view('suppliers.index')
            ->with(compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $supplier = Supplier::create($request->input());

        if ($supplier) {
            session()->flash('success', 'Supplier record was successfully created');
        } else {
            session()->flash('error', 'Supplier could not be created. Please try again');
        }
        return back();
    }


    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit')
            ->with(compact('supplier'));
    }


    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        if ($supplier->update($request->input())) {
            session()->flash('success', 'Supplier record was successfully updated');
        } else {
            session()->flash('error', 'Supplier record could not be updated.');
        }
        return back();
    }


    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
            session()->flash('success', 'Supplier record deleted!');
        } catch (\Exception $exception) {
            session()->flash('error', 'Supplier record could not be deleted!');
        }
        return back();
    }

}
