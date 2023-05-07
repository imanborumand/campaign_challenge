<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet\Wallet;
use App\Repositories\RepositoryBase;
use Illuminate\Support\Facades\DB;

class WalletRepository extends RepositoryBase
{

    public function __construct(Wallet $wallet)
    {
        $this->model = $wallet;
    }


    /**
     * get user balance
     * @param int $userId
     * @return float
     */
    public function getBalance( int $userId) : float
    {
        return $this->model->select(
            'user_id',
            DB::raw('SUM(CASE WHEN type = "increase" THEN amount ELSE -amount END) AS balance'))
                    ->where('user_id', $userId)
                    ->groupBy('user_id')
                    ->first()->balance ?? 0.0;
    }

}
