<?php

namespace App\Services\Admin\Gift;

use App\Exceptions\StoreModelException;
use App\Repositories\Gift\GiftCardRepository;
use App\Services\ServiceBase;
use Illuminate\Database\Eloquent\Model;

class AdminGiftCardService extends ServiceBase
{


    public function __construct(GiftCardRepository $cardRepository)
    {
        $this->repository = $cardRepository;
    }


    /**
     * @param array $params
     * @return Model
     * @throws StoreModelException
     */
    public function store( array $params) : Model
    {
        return $this->repository->store($params);
    }
}
