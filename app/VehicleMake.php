<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{
    protected $table = 'vehicle_makes';

    protected $fillable = [
        'name'
    ];

    public function vehicle_models()
    {
        return $this->hasMany(VehicleModel::class);
    }
}
