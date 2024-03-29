<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $table = 'work_orders';

    protected $fillable = [
        'customer_id',
        'customer_vehicle_id',
        'mileage',
        'comment',
        'service_date',
        'time_spent',
        'price_charge',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customer_vehicle()
    {
        return $this->belongsTo(CustomerVehicle::class);
    }

}
