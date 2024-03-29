<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';

    protected $fillable = [
        'product_id',
        'vehicle_make_id',
        'vehicle_model_id',
        'related_years', // covert to json later
    ];

    protected $casts = [
        //'related_years' => 'array'
    ];

    public function vehicle_make()
    {
        return $this->belongsTo(VehicleMake::class);
    }

    public function vehicle_model()
    {
        return $this->belongsTo(VehicleModel::class);
    }


}
