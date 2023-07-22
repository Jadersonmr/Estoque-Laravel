<?php

namespace App\Http\Repositories;

use App\Models\Consolidation;
use App\Models\Product;

class ProductConsolidationRepository
{
    /**
     * @var Consolidation
     */
    private $consolidation;

    public function __construct(Consolidation $consolidation)
    {
        $this->consolidation = $consolidation;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $data)
    {
        $consolidation = Consolidation::where('product_id', $data['product_id'])->first();

        if ($consolidation) {
            $consolidation->update($data);
            return $consolidation;
        }

        return $this->consolidation->create($data);
    }
}
