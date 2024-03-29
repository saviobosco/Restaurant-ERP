<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItemType extends Model
{

    protected $table = 'inventory_item_types';

    protected $fillable = [
        'name'
    ];
}
