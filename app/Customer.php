<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone_number',
        'memo',
    ];

    public function bikes()
    {
        return $this->hasMany(Bike::class);
    }
}
