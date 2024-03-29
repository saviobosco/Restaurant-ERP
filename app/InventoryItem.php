<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{

    protected $table = 'inventory_items';

    protected $fillable = [
        'name',
        'code',
        'type_id',
        'unit_measurement',
        'order_unit',
        'portion_unit_measurement',
        'portion_unit_cost',
        'unit_cost',
        'quantity'
    ];

    public function type()
    {
        return $this->belongsTo(InventoryItemType::class, 'type_id', 'id');
    }
}
