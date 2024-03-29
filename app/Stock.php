<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $table = 'stocks';

    protected $fillable = [
        'total_items',
        'type',
        'memo',
        'completed_at',
        'is_draft',
        'is_complete'
    ];

    public function stock_items()
    {
        return $this->hasMany(StockItem::class);
    }

}
