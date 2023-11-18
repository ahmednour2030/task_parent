<?php

namespace App\Utils;

use App\Http\Controllers\Provider\LoadProvider;
use Illuminate\Support\Collection;

class ProviderBuilder
{
    /**
     * @var Collection
     */
    protected Collection $data;

    /**
     * @param $provider
     */
    public function __construct($provider = null)
    {
       $this->data = LoadProvider::load($provider);
    }

    /**
     * @param $status
     * @return $this
     */
    public function whereStatus($status = null): static
    {
         $this->data = $status
             ? $this->data->where('status', $status)->values()
             : $this->data->values();

         return $this;
    }

    /**
     * @param $min
     * @param $max
     * @return $this
     */
    public function whereBalance($min, $max): static
    {
        $this->data = $min && $max
            ? $this->data->whereBetween('balance', [$min, $max])->values()
            : $this->data->values();

        return $this;
    }

    /**
     * @param int $items
     * @return Collection
     */
    public function getData(int $items = 100): Collection
    {
        return $this->data->chunk($items);
    }

}
