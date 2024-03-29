<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::paginate('20');
        return view("productCategories.index")
            ->with(compact('categories'));
    }

    public function create()
    {
        return view("productCategories.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        ProductCategory::create($request->input());
        session()->flash("success", "Product category was successfully created!");
        return back();

        /*try {
            $category = Category::create($request->input());

            if ($category) {
                if ($request->ajax()) {
                    return response()->json([
                        'type' => 'product_category',
                        'data' => $category
                    ]);
                }
                session()->flash('success', 'Product category was successfully added!');
            } else {
                if ($request->ajax()) {
                    return response()->json([
                        'type' => 'error',
                        'message' => 'Product category not added.'
                    ]);
                }
                session()->flash('error', 'Product category could not be added.');
                return back()->withInput();
            }
        } catch (\Exception $exception) {
            if ($request->ajax()) {
                return response()->json([
                    'type' => 'error',
                    'message' => 'Error occurred : Product category could not be created.'
                ]);
            }
            session()->flash('error', 'Error occurred : Product category could not be created.');
            return back()->withInput();

        }*/
    }


    public function edit(ProductCategory $productCategory)
    {
        return view("productCategories.edit")
            ->with(compact("productCategory"));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $this->validate($request, [
            'name' => "required"
        ]);

        $productCategory->update($request->input());

        session()->flash("success", "Product category was successfully updated.");
        return redirect()->route("productCategories.index");
    }

    public function destroy(ProductCategory $productCategory)
    {
        try {
            $productCategory->delete();
            session()->flash("success", "Product category successfully deleted!");
        } catch (\Exception $exception) {
            session()->flash("error", "Product category could not be deleted!");
        }
        return back();
    }



}
