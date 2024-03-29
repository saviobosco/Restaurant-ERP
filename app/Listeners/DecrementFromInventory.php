<?php

namespace App\Listeners;

use App\Events\ProductOrdered;
use App\InventoryItem;
use App\Product;

class DecrementFromInventory
{

    public function __construct()
    {
        //
    }

    public function handle(ProductOrdered $event)
    {
        $receiptItem = $event->product;
        $product = Product::with(['recipes'])->where('id', $receiptItem->product_id)->first();
        if ($product) {
            foreach($product->recipes as $recipe) {
                $item = InventoryItem::find($recipe->inventory_item_id);
                $item->update([
                    'quantity' => $item->quantity - ($recipe->portion_used * $receiptItem->quantity)
                ]);
            }
        }

        // Access the order using $event->order...
    }
}
