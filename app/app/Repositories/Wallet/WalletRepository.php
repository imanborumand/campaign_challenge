<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet\Wallet;
use App\Repositories\RepositoryBase;

class WalletRepository extends RepositoryBase
{

    public function __construct(Wallet $wallet)
    {
        $this->model = $wallet;
    }


}
