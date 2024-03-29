<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{

    protected $table = "stock_items";

    protected $fillable = [
        'stock_id',
        'item_id',
        'name',
        'quantity',
    ];
}
