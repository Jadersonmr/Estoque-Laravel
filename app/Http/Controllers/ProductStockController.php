<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function stockEntry()
    {
        return view('products-stock.entry');
    }
}
