<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_categories = [
            [
                'name' => 'Category',
                'type' => 'text'
            ],
            [
                'name' => 'Manufacturer',
                'type' => 'text'
            ],
            [
                'name' => 'Size',
                'type' => 'text'
            ]
        ];

        $items = [
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 1010',
                'quantity' => 10,
                '1' => 'Engine Oil',
                '2' => 'Germany',
                '3' => 'XL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 1020',
                'quantity' => 20,
                '1' => 'Engine Oil',
                '2' => 'Germany',
                '3' => 'XL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 1030',
                'quantity' => 20,
                '1' => 'Engine Oil',
                '2' => 'Germany',
                '3' => 'XL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 1040',
                'quantity' => 20,
                '1' => 'Engine Oil',
                '2' => 'Germany',
                '3' => 'XL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 1050',
                'quantity' => 20,
                '1' => 'Engine Oil',
                '2' => 'Germany',
                '3' => 'XL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 2014',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 30144',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 30145',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 30146',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 30147',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 30148',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '10W - 30149',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'China',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '13W - 30141',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'Malaysia',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '13W - 30142',
                'quantity' => 20,
                '1' => 'Tire',
                '2' => 'Malaysia',
                '3' => 'XXL'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1123 - Brake Pad',
                'quantity' => 20,
                '1' => 'Brake Pads',
                '2' => 'China',
                '3' => 'L'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1110 - Brake Pad',
                'quantity' => 20,
                '1' => 'Brake Pads',
                '2' => 'China',
                '3' => 'L'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1111 - Brake Pad',
                'quantity' => 20,
                '1' => 'Brake Pads',
                '2' => 'China',
                '3' => 'L'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1112 - Brake Pad',
                'quantity' => 20,
                '1' => 'Brake Pads',
                '2' => 'China',
                '3' => 'L'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1144 - Brake Pad',
                'quantity' => 20,
                '1' => 'Brake Pads',
                '2' => 'Germany',
                '3' => 'L'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1110 - Shocks',
                'quantity' => 20,
                '1' => 'Shocks',
                '2' => 'China',
                '3' => 'L'
            ],
            [
                'barcode' => rand(100000, 999999),
                'name' => '1115 - Shocks',
                'quantity' => 20,
                '1' => 'Shocks',
                '2' => 'Malaysia',
                '3' => 'L'
            ]
        ];

        foreach ($item_categories as $item_category) {
            \App\ItemCategory::create($item_category);
        }

        $this->command->info(count($item_categories) .' Item categories was successfully added');

        /*foreach ($items as $item) {
            $inventoryItem = \App\Item::create((collect($item))->only(['barcode','name','quantity'])->toArray());
            $item_category_values = (collect($item))->except(['barcode','name','quantity'])->toArray();
            foreach ($item_category_values as $id => $value) {
                if (is_numeric($id)) {
                    \App\ItemCategoryValue::create([
                        'item_id' => $inventoryItem->id,
                        'item_category_id' => $id,
                        'category_value' => $value
                    ]);
                }
            }
        }*/
    }
}
