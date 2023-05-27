<?php

namespace App\Http\Repositories;

use App\Models\Product;
use App\Models\ProductStock;

class ProductStockRepository
{
    /**
     * @var ProductStock
     */
    private $productStock;

    public function __construct(ProductStock $productStock)
    {
        $this->productStock = $productStock;
    }

    public function create($data): ProductStock
    {
        return $this->productStock->create($data);
    }
}
