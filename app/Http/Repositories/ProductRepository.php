<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function paginate($pages)
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate($pages);
    }

    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($data)
    {
        return $this->model->update($data);
    }

    public function search($filter)
    {
        return $this->model->search($filter);
    }
}
