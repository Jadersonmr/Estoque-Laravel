<?php

namespace App\Http\Repositories;

use App\Models\Movimentation;

class ProductMovimentationRepository
{
    /**
     * @var Movimentation
     */
    private $movimentation;

    public function __construct(Movimentation $movimentation)
    {
        $this->movimentation = $movimentation;
    }

    public function create(array $data)
    {
        return $this->movimentation->create($data);
    }
}
