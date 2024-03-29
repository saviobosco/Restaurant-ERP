<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'item_categories';

    protected $fillable = [
        'name',
        'type'
    ];


    public function options()
    {
        return $this->hasMany(ItemCategoryOption::class);
    }

}
