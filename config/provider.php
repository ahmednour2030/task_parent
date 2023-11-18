<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Namespace providers
    |--------------------------------------------------------------------------
    |
    | This value is the name of your providers.
    |
    */

    'namespace' => env('NAMESPACE_PROVIDER', 'App\Http\Controllers\Provider\Types'),


    /*
    |--------------------------------------------------------------------------
    | search name and class name providers
    |--------------------------------------------------------------------------
    |
    | name of search => class name
    |
    */

    'providers' => [
        'DataProviderX' => 'DataProviderX',
        'DataProviderY' => 'DataProviderY',
    ],


    /*
    |--------------------------------------------------------------------------
    | status code for mapping
    |--------------------------------------------------------------------------
    |
    |  status code
    |
    */

    'status' => [

        // for provider X

        1 => 'authorised',
        2 => 'DataProviderY',
        3 => 'DataProviderY',

        // for provider Y

        100 => 'authorised',
        200 => 'DataProviderY',
        300 => 'DataProviderY',
    ],

];
