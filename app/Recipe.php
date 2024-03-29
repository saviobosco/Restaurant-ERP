<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = "recipes";

    protected $fillable = [
        'product_id',
        'inventory_item_id',
        'portion_used'
    ];

    public function item()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_item_id', 'id');
    }
}
