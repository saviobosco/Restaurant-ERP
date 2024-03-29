<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptItem extends Model
{

    protected $table = "receipt_items";

    protected $fillable = [
        "receipt_id",
        "product_id",
        "quantity",
        "total",
        "order_note"
    ];
}
