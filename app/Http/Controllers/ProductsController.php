<?php

namespace App\Http\Controllers;

use App\Category;
use App\InventoryItem;
use App\Item;
use App\Product;
use App\ProductCategory;
use App\VehicleYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{


    public function index()
    {
        $products = Product::paginate(20);

        if (\request()->ajax()) {
            return $products;
        }

        return view('products.index')
            ->with(compact('products'));
    }

    public function create()
    {
        // get all items
        $categories = ProductCategory::pluck("name", "id")->toArray();
        return view('products.create')
            ->with(compact("categories"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => ['required', 'numeric'],
            'code' => ['nullable', "unique:products"],
        ]);

        Product::create($request->input());
        session()->flash('success', 'Product was successfully added!');

        return back();
    }


    public function edit(Product $product)
    {
        $categories = ProductCategory::pluck("name", "id")->toArray();

        return view('products.edit')
            ->with(compact('product', 'categories'));
    }


    public function view(Product $product)
    {
        $items = InventoryItem::query()
            ->get()
            ->map(function($i){
                $i->displayName = $i->name ." (". $i->portion_unit_measurement.")";
                return $i;
            })->pluck("displayName", "id");

        return view('products.view')
            ->with(compact('product',
                'items'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->input());
        session()->flash("success", "Product was successfully updated!");

        return back();
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            session()->flash('success', 'Product was successfully deleted');
        } catch (\Exception $exception) {
            session()->flash('error', 'Product could not be deleted');
        }
        return back();
    }

    public function search()
    {
        $search_query = \request()->query('_q');

        $products = Product::query()
            ->where('name', 'like', '%'.$search_query.'%')
            ->get();

        return response()->json([
            'type' => 'products',
            'data' => $products
        ]);
    }

    public function addMultiple()
    {
        // get all items not in products table
        // get all items id in the product table
        $productItemArray = Product::query()
            ->pluck('item_id')
            ->toArray();

        $items = Item::query()
            ->whereNotIn('id', $productItemArray)
            ->get();

        return view('products.add_multiple')
            ->with(compact('items'));
    }


    public function processAddMultiple(Request $request)
    {
        $products = $request->input('products');

        if (empty($products)) {
            session()->flash('error', 'Products input is empty!');
            return back();
        }

        foreach ($products as $product) {
            if ($product['cost'] && $product['price']) {
                Product::create($product);
            }
        }
        session()->flash('success', 'Products was successfully added');

        return redirect()
            ->route('products.index');
    }

}
