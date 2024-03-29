<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategoryOption extends Model
{
    protected $table = 'item_category_options';

    protected $fillable = [
        'item_category_id',
        'option_text'
    ];

    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class);
    }

}
