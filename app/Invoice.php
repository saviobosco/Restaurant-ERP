<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoices';

    protected $fillable = [
        'license_number',
        'customer_id',
        'odometer',
        'issued_by',
        'discount',
        'tax',
        'sub_total',
        'total',
        'remark',
    ];

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
