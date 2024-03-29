<?php

namespace App\Http\Controllers;

use App\Item;
use App\Partner;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{

    public function add()
    {
        $items = Item::query()
            ->with(['item_category_values'])
            ->get();

        return view('stocks.add')
            ->with(compact('items'));
    }


    public function store(Request $request)
    {
        // check if the items are not empty
        $items = $request->input('stock_items');
        if (empty($items)) {
            session()->flash('error', 'Stock items are empty');
            return back();
        }
        try {
            DB::beginTransaction();
            // check if the partner is set
            $partner_name = $request->input('partner');
            if ($partner_name) {
                // check if the name exist and select it else, find the partner
                $partner = Partner::query()
                    ->where('name', trim($request->input('partner')))
                    ->first();
                if (!$partner) {
                    $partner = Partner::create(['name' => $partner_name, 'type' => 'supplier']);
                }
            }

            $newStockData = [
                'partner_id' => (isset($partner)) ? $partner->id : null,
                'memo' => $request->input('memo'),
                'type' => 'stock_in',
                'total_items' => $request->input('total_items_count'),
            ];

            $stock = Stock::create($newStockData);
            if ($stock) {
                foreach($items as $item) {
                    $stock->stock_items()->create([
                        'item_id' => $item['id'],
                        'name' => $item['name'],
                        'quantity' => $item['quantity']
                    ]);
                    // update the items in the items table
                    $inventoryItem = Item::find($item['id']);
                    $inventoryItem->updateQuantity($item['quantity']);
                }
            }
            DB::commit();

            return response()->json([
                'type' => 'success',
                'message' => 'Successful'
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'type' => 'error',
                'message' => 'Failed '. $exception->getMessage()
            ]);
        }
    }

    public function history()
    {
        $stocks = Stock::query()
            ->latest()
            ->get();

        return view('stocks.history')
            ->with(compact('stocks'));
    }

    public function show(Stock $stock)
    {
        return view('stocks.view')
            ->with(compact('stock'));
    }
}
