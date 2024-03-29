<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerVehicle extends Model
{

    protected $table = 'customer_vehicles';

    protected $fillable = [
        'customer_id',
        'name',
        'license_plate_number',
        'vin',
        'comment',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
