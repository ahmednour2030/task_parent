<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProviderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @var ProviderService
     */
    protected ProviderService $provider;

    /**
     * @param ProviderService $providerService
     */
    public function __construct(ProviderService $providerService)
    {
        $this->provider = $providerService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $data = $this->provider->get($request);

        return response()->json(['status' => 200, 'data' => $data]);
    }
}
