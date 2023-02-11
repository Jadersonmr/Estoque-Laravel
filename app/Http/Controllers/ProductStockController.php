<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductStockRepository;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    const ROUTE = 'products.index';

    /**
     * @var ProductStockRepository
     */
    private $productStockRepository;

    public function __construct(ProductStockRepository $productStockRepository)
    {
        $this->productStockRepository = $productStockRepository;
    }

    public function stockEntry($productId)
    {
        return view('products-stock.entry')->with(['productId' => $productId]);
    }

    public function store(Request $request)
    {
        $this->productStockRepository->create($request->all());

        return redirect()->route(self::ROUTE);
    }
}
