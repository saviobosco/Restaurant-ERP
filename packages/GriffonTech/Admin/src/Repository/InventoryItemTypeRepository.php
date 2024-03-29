<?php

namespace GriffonTech\Admin\Repository;

use GriffonTech\Admin\Models\InventoryItemType;
use GriffonTech\Core\Eloquent\Repository;

class InventoryItemTypeRepository extends Repository
{

    public function model()
    {
        return InventoryItemType::class;
    }
}
