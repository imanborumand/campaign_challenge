<?php

namespace App\Services\Api\Wallet;

use App\Repositories\Wallet\WalletRepository;
use App\Services\Api\User\UserService;
use App\Services\ServiceBase;

class WalletService extends ServiceBase
{

    protected UserService $userService;


    public function __construct(WalletRepository $repository)
    {
        $this->repository = $repository;
        $this->userService = app(UserService::class);
    }



    public function balance(string $mobile)
    {
        $user = $this->userService->getByMobileNumber($mobile);


    }

}
