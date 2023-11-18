<?php

namespace App\Services;

use App\Utils\ProviderBuilder;
use Illuminate\Support\Collection;

class ProviderService
{
    /**
     * @param $request
     * @return Collection
     */
    public function get($request): Collection
    {
        $provider = $request->get('provider');

        $status = $request->get('status');

        $min = $request->get('balanceMin');

        $max = $request->get('balanceMax');

        $build = new ProviderBuilder($provider);

        return $build->whereStatus($status)
            ->whereBalance($min, $max)
            ->getData();
    }

}
