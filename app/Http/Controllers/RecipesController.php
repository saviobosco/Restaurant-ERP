<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'inventory_item_id' => 'required',
        ]);

        Recipe::create($request->input());
        session()->flash("success", "Recipe was successfully added!");
        return back();
    }

    public function edit(Recipe $recipe)
    {
        return view("recipes.edit")
            ->with(compact("recipe"));
    }




    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update($request->input());
        session()->flash("success", "Recipe was updated");
        return back();
    }


    public function destroy(Recipe $recipe)
    {
        try {
            $recipe->delete();
            session()->flash("success", " Recipe wss successfully deleted!");
        } catch (\Exception $exception) {
            session()->flash("error", "Error deleting recipe");
        }
        return back();
    }
}
