<?php

namespace GriffonTech\Admin\Repository;

use GriffonTech\Admin\Models\Restaurant;
use GriffonTech\Core\Eloquent\Repository;

class RestaurantRepository extends Repository
{

    public function model()
    {
        return Restaurant::class;
    }
}
