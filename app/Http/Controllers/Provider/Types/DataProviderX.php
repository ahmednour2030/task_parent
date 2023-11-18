<?php

namespace App\Http\Controllers\Provider\Types;

use App\Http\Controllers\Provider\Provider;
use Illuminate\Support\Collection;

class DataProviderX extends Provider
{
    /**
     * @return Collection
     */
    public function __invoke(): Collection
    {
        $path = 'DataProviderX.json';

        $arrayMap = [
            'balance'    => 'parentAmount',
            'currency'   => 'Currency',
            'status'     => 'statusCode',
            'created_at' => 'registerationDate',
            'id'         => 'parentIdentification',
        ];

        return $this->get($path, $arrayMap);
    }
}
