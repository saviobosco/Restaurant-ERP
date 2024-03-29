<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerVehicle;
use Illuminate\Http\Request;

class CustomerVehiclesController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        $customers = Customer::query()
            ->select(['id', 'first_name', 'last_name'])
            ->get()
            ->pluck('name', 'id')
            ->prepend('Select Customer', '')
            ->toArray();

        return view('customer_vehicles.create')
            ->with(compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'name' => 'required',
            'license_plate_number' => 'required'
        ]);

        $vehicle = CustomerVehicle::create($request->input());
        if($vehicle) {
            if ($request->ajax()) {
                return response()->json([
                    'type' => 'customer_vehicle',
                    'data' => $vehicle
                ]);
            }
            session()->flash('success', 'customer motorcycle was successfully added.');
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'type' => 'error',
                    'message' => 'Customer motorcycle could not be added. Please try again later.'
                ]);
            }
            session()->flash('error', 'Customer motorcycle could not be added. Please try again later.');
            return back()->withInput();
        }
        return back();
    }

    public function edit(CustomerVehicle $customerVehicle)
    {
        return view('customer_vehicles.edit')
            ->with(compact('customerVehicle'));
    }

    public function update(Request $request, CustomerVehicle $customerVehicle)
    {
        $this->validate($request, [
            'name' => 'required',
            'license_plate_number' => 'required'
        ]);

        if ($customerVehicle->update($request->input())) {
            session()->flash('success', 'Motorcycle details was successfully updated');
        } else {
            session()->flash('error', 'Motorcycle details could not be updated. Please try again');
        }
        return back();
    }

    public function destroy()
    {

    }

    public function getByCustomerId($customer_id)
    {
        $vehicles = CustomerVehicle::query()
            ->where('customer_id', $customer_id)
            ->get()
            ->toArray();

        return response()->json([
            'type' => 'customer_vehicles',
            'data' => $vehicles
        ]);
    }
}
