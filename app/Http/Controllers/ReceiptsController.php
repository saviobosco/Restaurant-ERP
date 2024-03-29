<?php

namespace App\Http\Controllers;

use App\Receipt;

class ReceiptsController extends Controller
{

    public function index()
    {
        $receipts = Receipt::all();

        return view("receipts.index")
            ->with(compact('receipts'));
    }
}
