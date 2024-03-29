<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\ItemCategory;
use App\ItemCategoryOption;
use App\ItemCategoryValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function index()
    {
        if (\request()->wantsJson()) {
            $items = Item::query();
            $items = $items->select(['id','barcode','name','quantity','sell_price as price']);
            if (\request()->query('category_id')) {
                $items = $items->where('category_id', \request()->query('category_id'));
            }
            $items = $items->get();
            return response()->json([
                'type' => 'items',
                'data' => $items
            ]);
        }

        $items = Item::query()
            ->paginate(20);

        return view('items.index')
            ->with(compact('items'));
    }


    public function create()
    {
        $item_categories = ItemCategory::all();

        $categories = Category::pluck('name', 'id');

        return view('items.create')
            ->with(compact('item_categories', 'categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required'
        ]);

        $postData = $request->input();
        $item = Item::create($postData);
        if ($item) {
            // store the item categories
            $item_categories = $request->except([
                'name', 'barcode',
                'quantity', '_method',
                'cost_price','sell_price',
                'sku', 'category_id']);

            foreach ($item_categories as $id => $value) {
                if (is_numeric($id) && !empty($value)) {
                    $item_category = ItemCategory::find($id);
                    if ($item_category) {
                        if ($item_category->type === 'text') {
                            // check for the value in the options table
                            $option = ItemCategoryOption::query()
                                ->where('option_text', trim($value))
                                ->first();

                            if (!$option) {
                                $option = ItemCategoryOption::create([
                                    'item_category_id' => $id,
                                    'option_text' => trim($value)
                                ]);
                            }
                            ItemCategoryValue::create([
                                'item_id' => $item->id,
                                'item_category_id' => $id,
                                'category_value' => $option->id
                            ]);
                        } else {
                            ItemCategoryValue::create([
                                'item_id' => $item->id,
                                'item_category_id' => $id,
                                'category_value' => $value
                            ]);
                        }
                    }
                }
            }
            session()->flash('success', 'Item was successfully added');
        } else {
            session()->flash('error', 'Item could not be added. Please try again');

            return back()->withInput();
        }
        return back();
    }


    public function edit(Item $item)
    {
        $item_categories = ItemCategory::all();

        $categories = Category::pluck('name', 'id');

        return view('items.edit')
            ->with(compact('item_categories',
                'item', 'categories'));
    }


    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $updated = $item->update($request->only(['name', 'barcode','sku','cost_price','sell_price', 'category_id']));
        if ($updated) {
            $item_categories = $request
                ->except([
                'name', 'barcode', 'quantity', '_method','cost_price','sell_price', 'sku','_token', 'category_id'
            ]);

            foreach ($item_categories as $id => $value) {
                if (is_numeric($id) && !empty($value)) {
                    $item_category = ItemCategory::find($id);

                    if ($item_category) {
                        if ($item_category->type === 'text') {
                            // check for the value in the options table
                            $option = ItemCategoryOption::query()
                                ->where('option_text', trim($value))
                                ->first();

                            if ($option) {
                                $item_category_value = $item->item_category_values()
                                    ->where([
                                    'item_category_id' => $id
                                ])->first();
                                if ($item_category_value) {
                                    // if the category value are not same
                                    if ($item_category_value->category_value !== $option->id) {
                                        $item_category_value->update([
                                            'category_value' => $option->id
                                        ]);
                                    }
                                } else {
                                    $item->item_category_values()->create([
                                        'item_category_id' => $id,
                                        'category_value' => $option->id
                                    ]);
                                }
                            } else {
                                $option = ItemCategoryOption::create([
                                    'item_category_id' => $id,
                                    'option_text' => trim($value)
                                ]);
                                $item_category_value = $item->item_category_values()
                                    ->where([
                                        'item_category_id' => $id
                                    ])->first();
                                if ($item_category_value) {
                                    $item_category_value->update([
                                        'category_value' => $option->id
                                    ]);
                                } else {
                                    $item->item_category_values()->create([
                                        'item_category_id' => $id,
                                        'category_value' => $option->id
                                    ]);
                                }
                            }
                        } else {
                            $item_category_value = $item->item_category_values()
                                ->where([
                                    'item_category_id' => $id
                                ])->first();
                            if ($item_category_value) {
                                $item_category_value->update([
                                    'category_value' => $value
                                ]);
                            } else {
                                $item->item_category_values()->create([
                                    'item_category_id' => $id,
                                    'category_value' => $value
                                ]);
                            }
                        }
                    }
                }
            }
            session()->flash('success', 'Item record was successfully updated');
        } else {
            session()->flash('error', 'item could not be updated. Please try again!.');

            return back()->withInput();
        }
        return back();
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();
            $item->item_category_values()->delete();

            session()->flash('success', 'Item was successfully deleted');
        } catch (\Exception $exception) {
            session()->flash('error', 'item could not be deleted.');
        }
        return back();
    }

    public function search()
    {
        $searchQuery = \request()->query('_q');
        // find all items with the name
        $items = Item::query()
            ->where('name', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        return $items;
    }

}
