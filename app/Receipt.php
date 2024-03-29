<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = "receipts";

    protected $fillable = [
        'serial_number',
        'is_fulFilled',
        'status',
        'order_note',
        'booking_note',
        'sale_type',
        'booking_time',
        'total',
        'is_door_delivery'
    ];

    public function items()
    {
        return $this->hasMany(ReceiptItem::class);
    }
}
