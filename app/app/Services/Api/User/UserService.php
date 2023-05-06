<?php

namespace App\Services\Api\User;

use App\Exceptions\CustomNotfoundException;
use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Services\ServiceBase;

class UserService extends ServiceBase
{

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * get user by mobile number
     * @param string $mobile
     * @return User
     * @throws CustomNotfoundException
     */
    public function getByMobileNumber( string $mobile) : User
    {
        $user = $this->repository->getUserByMobileNumber($mobile);
        if ($user) {
            return $user;
        }
        throw new CustomNotfoundException();
    }



}
