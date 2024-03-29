<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'PRODUCTS';

    protected $fillable = [
        "name",
        "code",
        "price",
        "category_id",
        "note",
        "sort_order"
    ];


    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
