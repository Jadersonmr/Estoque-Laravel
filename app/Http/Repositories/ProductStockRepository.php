<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductStockRepository
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create($data)
    {
        return $this->product->create($data);
    }
}
