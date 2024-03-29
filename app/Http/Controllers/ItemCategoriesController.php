<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use App\ItemCategoryOption;
use Illuminate\Http\Request;

class ItemCategoriesController extends Controller
{

    public function index()
    {
        $item_categories = ItemCategory::all();

        return view('item_categories.index')
            ->with(compact('item_categories'));
    }

    public function create()
    {
        return view('item_categories.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ]);

        $item_category = ItemCategory::create($request->input());
        if ($item_category) {
            session()->flash('success', 'Category was successfully created');
        } else {
            session()->flash('error', 'Category could not be created.');

            return back()->withInput();
        }
        return back();
    }

    public function edit(ItemCategory $itemCategory)
    {
        return view('item_categories.edit')
            ->with(compact('itemCategory'));
    }

    public function update(Request $request, ItemCategory $itemCategory)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ]);

        $updated = $itemCategory->update($request->input());
        if ($updated) {
            session()->flash('success', 'Item category was successfully updated');
        } else {
            session()->flash('error', 'Item category could not be updated. Please try again');
        }
        return back();
    }

    public function destroy(ItemCategory $itemCategory)
    {
        try {
            $itemCategory->delete();
            session()->flash('success', 'Item category was successfully deleted');
        } catch(\Exception $exception) {
            session()->flash('error', 'Error occurred: Item category could not be deleted. Please try again!');
        }

        return back();
    }

    public function fetchOptionValues($id)
    {
        $options = ItemCategoryOption::query()
            ->select(['id', 'option_text'])
            ->where('item_category_id', $id)
            ->get();

        return response()
            ->json([
                'data' => $options
            ]);
    }
}
