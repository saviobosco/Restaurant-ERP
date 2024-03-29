<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        if (\request()->wantsJson()) {
            $categories = Category::all();
            return response()->json([
                'type' => 'categories',
                'data' => $categories
            ]);
        }

        $categories = Category::all();
        return view('categories.index')
            ->with(compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::create($request->input());
        if ($category) {
            session()->flash('success', 'Category was successfully saved!');
        } else {
            session()->flash('error', 'Category could not be saved!');
        }
        return back();
    }

    public function edit(Category $category)
    {
        return view('categories.edit', $category)
            ->with(compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $updated = $category->update($request->input());
        if ($updated) {
            session()->flash('success', 'Category was successfully updated!');
        } else {
            session()->flash('error', 'Category could not be updated!');
        }
        return back();
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
            session()->flash('success', 'Category was successfully deleted');
        } catch (\Exception $exception) {
            session()->flash('error', 'Category could not be deleted.');
        }
        return back();
    }
}
