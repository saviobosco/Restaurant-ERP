<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategoryValue extends Model
{
    protected $table = 'item_category_values';

    protected $fillable = [
        'item_id',
        'item_category_id',
        'category_value'
    ];

}
