<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_items';

    protected $fillable = [
        'invoice_id',
        'product_id',
        'item_id',
        'quantity',
        'name',
        'price',
        'total',
    ];

}
