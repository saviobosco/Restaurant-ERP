<?php

namespace App\Http\Controllers;


use App\Receipt;

class DashboardController extends Controller
{
    public function index()
    {

        $totalSales = Receipt::query()->sum('total');

        return view('dashboard.index')
            ->with(compact('totalSales'));
    }

}
