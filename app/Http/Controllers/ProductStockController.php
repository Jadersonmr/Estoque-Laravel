<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductConsolidationRepository;
use App\Http\Repositories\ProductMovimentationRepository;
use App\Http\Requests\StoreStockRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductStockController extends Controller
{
    /**
     * @var ProductMovimentationRepository
     */
    private $productMovimentationRepository;
    /**
     * @var ProductConsolidationRepository
     */
    private $productConsolidationRepository;

    public function __construct(ProductMovimentationRepository $productMovimentationRepository,
                                ProductConsolidationRepository $productConsolidationRepository)
    {
        $this->productMovimentationRepository = $productMovimentationRepository;
        $this->productConsolidationRepository = $productConsolidationRepository;
    }

    /**
     * @param $productId
     * @return Application|Factory|View
     */
    public function create($productId)
    {
        return view('products-stock-entry.create')->with(['productId' => $productId]);
    }

    /**
     * @param $productId
     * @return Application|Factory|View
     */
    public function stockOutput($productId)
    {
        return view('products-stock-output.create')->with(['productId' => $productId]);
    }

    /**
     * @param StoreStockRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStockRequest $request)
    {
        $input = $request->all();
        $input['consolidation_id'] = $this->productConsolidationRepository->updateOrCreate(['quantity' => $input['quantity'], 'product_id' => $input['product_id']])->id;

        $this->productMovimentationRepository->create($input);

        return redirect()->route('products.index');
    }
}
