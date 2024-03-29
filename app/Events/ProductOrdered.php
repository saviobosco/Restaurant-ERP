<?php

namespace App\Events;

use App\Product;
use App\ReceiptItem;
use Illuminate\Queue\SerializesModels;

class ProductOrdered
{

    use SerializesModels;

    public $product;

    public function __construct(ReceiptItem $product)
    {
        $this->product = $product;
    }

}
