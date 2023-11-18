<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use JsonMachine\Exception\InvalidArgumentException;
use JsonMachine\Items;

abstract class Provider
{
    /**
     * @param string $path
     * @param array $arrayKeys
     * @return Collection
     * @throws InvalidArgumentException
     */
    public function get(string $path, array $arrayKeys): Collection
    {
        if (File::exists(storage_path($path))) {

            // Use JSONMachine to stream through the JSON data

            $jsonStream = Items::fromFile(storage_path($path));

            $collection = collect($jsonStream);

            // you can use chunk here to in mapping...

            return $collection->map(function ($provider) use ($arrayKeys) {
                return [
                    'balance' => $provider->{$arrayKeys['balance']},
                    'currency' => $provider->{$arrayKeys['currency']},
                    'status' => config('provider.status')[$provider->{$arrayKeys['status']}] ?? NULL,
                    'created_at' => $provider->{$arrayKeys['created_at']},
                    'id' => $provider->{$arrayKeys['id']},
                ];
            });
        }
        return collect();
    }
}
