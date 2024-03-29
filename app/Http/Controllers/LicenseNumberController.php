<?php

namespace App\Http\Controllers;

use App\Bike;

class LicenseNumberController extends Controller
{
    public function search()
    {
        $license_number = request()->query('license_number');
        if ($license_number) {
            $bikes = Bike::query()
                ->with(['customer'])
                ->where('license_number', 'LIKE', '%'. $license_number. '%')
                ->get();

            return response()->json([
                'type' => 'bikes',
                'data' => $bikes
            ]);
        }

        return response()->json(['message' => 'Not Found!'], 404);
    }

}
