<?php

namespace App\Repositories\User;

use App\Models\User\User;
use App\Repositories\RepositoryBase;

class UserRepository extends RepositoryBase
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }


    public function getUserByMobileNumber(string $mobile) : ?User
    {
        return $this->model->where('mobile', $mobile)->first();
    }

}
