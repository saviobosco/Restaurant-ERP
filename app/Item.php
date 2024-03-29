<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'barcode',
        'quantity',
        'photo',
        'cost_price',
        'sell_price',
        'category_id'
    ];

    /*protected $appends = [
        'item_attributes'
    ];*/


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function item_category_values()
    {
        return $this->hasMany(ItemCategoryValue::class);
    }

    public function getAttribute($key)
    {
        if (is_numeric($key)
            && isset($this->id)
        ) {
            if (isset($this->id)) {
                $this->attributes[$key] = '';

                // check for the category type
                $item_category = ItemCategory::find($key);
                if ($item_category) {
                    if ($item_category->type === "text") {
                        $item_category_value = $this->item_category_values()->where([
                            'item_id'=>$this->id,
                            'item_category_id' => $key])
                            ->first();
                        if ($item_category_value) {
                            $this->attributes[$key] = ItemCategoryOption::query()
                                ->where('id', $item_category_value->category_value)
                                ->first()['option_text'];
                        } else {
                            $this->attributes[$key] = null;
                        }
                    } else {
                        $this->attributes[$key] = $this->item_category_values()->where([
                            'item_id'=>$this->id,
                            'item_category_id' => $key])
                            ->first()['category_value'];
                    }
                }
                return $this->attributes[$key];
            }
        }
        return parent::getAttribute($key);
    }

    public function getItemAttributesAttribute()
    {
        $attribute = '';
        $item_categories = ItemCategory::pluck('type', 'id');
        foreach($item_categories as $item_category) {

            $attribute .= $this->item_category_values()->where([
                    'item_id'=>$this->id,
                    'item_category_id' => $item_category])
                    ->first()['category_value'].'/';
        }
        return substr($attribute, 0, -1);
    }

    public function updateQuantity($quantity)
    {
        return $this->update([
            'quantity' => $this->quantity + $quantity
        ]);
    }
}
