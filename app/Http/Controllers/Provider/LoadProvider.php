<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Support\Collection;

final class LoadProvider
{
    /**
     * @param $provider
     * @return Collection
     */
    public static function load($provider): Collection
    {
        $providerData = self::getProviders($provider);

        $collections = collect();

        foreach ($providerData as $class) {

            $className = config('provider.namespace') . '\\' . $class;

            $collection = (new $className())() ?? collect();

            $collections = $collections->merge($collection);
        }

        return $collections;
    }

    /**
     * @param $provider
     * @return array
     */
    private static function getProviders($provider): array
    {
        $providers = config('provider.providers');

        $filter = array_filter($providers, function ($value) use ($provider) {
            return $value === $provider;
        });

        return count($filter) === 0 ? $providers : $filter;
    }
}
