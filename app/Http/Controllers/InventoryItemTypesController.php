<?php

namespace App\Http\Controllers;

use App\InventoryItemType;
use Illuminate\Http\Request;

class InventoryItemTypesController extends Controller
{

    public function index()
    {
        $itemTypes = InventoryItemType::query()->paginate(20);

        return view("inventoryItemTypes.index")
            ->with(compact('itemTypes'));
    }


    public function create()
    {
        return view("inventoryItemTypes.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        InventoryItemType::create($request->input());
        session()->flash('success', 'Item was successfully added');
        return back();
    }

    public function edit(InventoryItemType $inventoryItemType)
    {
        return view("inventoryItemTypes.edit")
            ->with(compact("inventoryItemType"));
    }

    public function update(Request $request, InventoryItemType $inventoryItemType)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $inventoryItemType->update($request->input());
        session()->flash('success', 'Item was successfully added');
        return back();
    }

    public function destroy(InventoryItemType $inventoryItemType)
    {
        try {
            $inventoryItemType->delete();

            session()->flash('success', 'Item was successfully deleted!');

        } catch (\Exception $exception) {
            session()->flash('error', 'Item could not be deleted! :'. $exception->getMessage());
        }
        return back();
    }
}
