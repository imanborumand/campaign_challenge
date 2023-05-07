<?php

namespace App\Services\Api\Wallet;

use App\Repositories\Wallet\WalletRepository;
use App\Services\Api\User\UserService;
use App\Services\ServiceBase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WalletService extends ServiceBase
{

    protected UserService $userService;


    public function __construct(WalletRepository $repository)
    {
        $this->repository = $repository;
        $this->userService = app(UserService::class);
    }


    /**
     * @param string $mobile
     * @return float
     */
    public function balance( string $mobile) : float
    {
        $user = $this->userService->getByMobileNumber($mobile);
        if(!$user) {
            throw new NotFoundHttpException();
        }

        return $this->repository->getBalance($user->id);
    }

}
