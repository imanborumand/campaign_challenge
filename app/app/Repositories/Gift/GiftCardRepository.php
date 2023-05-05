<?php

namespace App\Repositories\Gift;

use App\Models\Gift\GiftCard;
use App\Repositories\RepositoryBase;

class GiftCardRepository extends RepositoryBase
{


    public function __construct(GiftCard $card)
    {
        $this->model = $card;
    }




}
