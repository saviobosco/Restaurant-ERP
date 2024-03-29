<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {
        return view('purchases.index');
    }

    public function create()
    {
        return view('purchases.create');
    }


    public function store(Request $request)
    {

        return back();
    }

}
