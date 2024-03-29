<?php

namespace App\Http\Controllers;

use App\Enums\UnitMeasurement;
use App\InventoryItem;
use App\InventoryItemType;
use Illuminate\Http\Request;

class InventoryItemsController extends Controller
{

    public function index()
    {
        $items = InventoryItem::query()->paginate(20);

        return view("inventoryItems.index")
            ->with(compact('items'));
    }


    public function create()
    {
        $types = InventoryItemType::pluck('name', 'id');
        $unitMeasurement = UnitMeasurement::all();
        return view("inventoryItems.create")
            ->with(compact('types', 'unitMeasurement'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => ['required', 'unique:inventory_items'],
            'name' => ['required'],
            'unit_cost' => ['numeric']
        ]);

        InventoryItem::create($request->input());
        session()->flash('success', "Item was successfully created");
        return back();
    }

    public function edit(InventoryItem $inventoryItem)
    {
        $types = InventoryItemType::pluck('name', 'id');
        $unitMeasurement = UnitMeasurement::all();
        return view("inventoryItems.edit")
            ->with(compact("inventoryItem", "types",'unitMeasurement'));
    }

    public function update(Request $request, InventoryItem $inventoryItem)
    {
        $this->validate($request, [
            'code' => ['required'],
            'name' => ['required']
        ]);

        $inventoryItem->update($request->input());
        session()->flash('success', "Item was successfully updated");

        return redirect()->route("inventoryItems.index");
    }


    public function destroy(InventoryItem $inventoryItem)
    {
        try {
            $inventoryItem->delete();
        } catch (\Exception $exception) {
            session()->flash('success', "Item was successfully deleted!");
        }
        return back();
    }


}
