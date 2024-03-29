<?php

namespace GriffonTech\Admin\Repository;

use GriffonTech\Admin\Models\InventoryItem;
use GriffonTech\Core\Eloquent\Repository;

class InventoryItemRepository extends Repository
{

    public function model()
    {
        return InventoryItem::class;
    }
}
