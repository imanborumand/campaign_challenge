<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Wallet\GetBalanceRequest;
use App\Http\Resources\Api\Wallet\BalanceResource;
use App\Services\Api\Wallet\WalletService;
use Illuminate\Http\JsonResponse;

class WalletController extends Controller
{

    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }


    /**
     * @param GetBalanceRequest $request
     * @return JsonResponse
     */
    public function balance( GetBalanceRequest $request) : JsonResponse
    {

        return $this->successResponse()
            ->setResult(
                new BalanceResource(['balance' => $this->service->balance($request->mobile)])
            )->response();
    }

}
