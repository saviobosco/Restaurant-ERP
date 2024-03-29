<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Customer;
use App\CustomerVehicle;
use Illuminate\Http\Request;

class BikesController extends Controller
{

    public function index()
    {
        $bikes = Bike::query()
            ->paginate(20);

        return view('bikes.index')
            ->with(compact('bikes'));
    }

    public function create()
    {
        $customers = Customer::query()
            ->pluck('name', 'id')
            ->prepend('Select Customer', '')
            ->toArray();

        return view('bikes.create')
            ->with(compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'license_number' => 'required'
        ]);

        $bike = Bike::create($request->input());
        if($bike) {
            if ($request->ajax()) {
                return response()->json([
                    'type' => 'bike',
                    'data' => $bike
                ]);
            }
            session()->flash('success', 'customer bike was successfully added.');
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

    public function edit(Bike $bike)
    {
        return view('bikes.edit')
            ->with(compact('bike'));
    }

    public function update(Request $request, Bike $bike)
    {
        $this->validate($request, [
            'license_number' => 'required'
        ]);

        if ($bike->update($request->input())) {
            session()->flash('success', 'Bike details was successfully updated');
        } else {
            session()->flash('error', 'Bike details could not be updated. Please try again');
        }
        return back();
    }

    public function destroy(Bike $bike)
    {
        try {
            $bike->delete();
            session()->flash('success','Bike record was successfully deleted.');
        } catch (\Exception $exception) {
            session()->flash('error', 'An error occurred. Could not delete bike record. Please try again');
        }
        return back();
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

    public function addCustomerBike(Request $request)
    {
        $this->validate($request, [
            'license_number' => 'required|unique:"bikes"',
            'customer_phone_number' => 'required'
        ]);

        // check if the customer exists
        $customer = Customer::query()
            ->select(['id'])
            ->where('phone_number', $request->input('customer_phone_number'))
            ->first();

        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->input('customer_name'),
                'phone_number' => $request->input('customer_phone_number'),
                'email' => $request->input('customer_email'),
                'memo' => $request->input('customer_memo')
            ]);
        }

        $bike = Bike::create([
            'customer_id' => $customer->id,
            'license_number' => $request->input('license_number'),
            'make' => $request->input('bike_make'),
            'model' => $request->input('bike_model'),
            'memo' => $request->input('bike_model'),
        ]);

        $bike = Bike::query()
            ->with(['customer'])
            ->where('id', $bike->id)
            ->first();

        return response()->json([
            'type' => 'bike',
            'data' => $bike
        ]);
    }
}
