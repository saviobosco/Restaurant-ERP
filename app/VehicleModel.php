<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{

    protected $table = 'vehicle_models';

    protected $fillable = [
        'name',
        'vehicle_make_id'
    ];
}
