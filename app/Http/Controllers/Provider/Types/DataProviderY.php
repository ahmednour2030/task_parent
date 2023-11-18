<?php

namespace App\Http\Controllers\Provider\Types;

use App\Http\Controllers\Provider\Provider;
use Illuminate\Support\Collection;
use JsonMachine\Exception\InvalidArgumentException;

class DataProviderY extends Provider
{
    /**
     * @throws InvalidArgumentException
     */
    public function __invoke(): Collection
    {
        $path = 'DataProviderY.json';

        $arrayMap = [
            'balance'    => 'balance',
            'currency'   => 'currency',
            'status'     => 'status',
            'created_at' => 'created_at',
            'id'         => 'id',
        ];

        return $this->get($path, $arrayMap);
    }
}
