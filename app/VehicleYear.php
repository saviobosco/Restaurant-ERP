<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleYear extends Model
{
    protected $table = 'vehicle_years';

    protected $fillable = [
        'model_year'
    ];

}
