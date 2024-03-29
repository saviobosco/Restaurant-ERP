<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{

    protected $table = 'bikes';

    protected $fillable = [
        'customer_id',
        'license_number',
        'make',
        'model',
        'identification_number',
        'memo'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
