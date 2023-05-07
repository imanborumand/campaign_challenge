<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Wallet\GetBalanceRequest;
use App\Services\Api\Wallet\WalletService;

class WalletController extends Controller
{

    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }



    public function balance(GetBalanceRequest $request)
    {
        return $this->service->balance($request->mobile);
    }

}
