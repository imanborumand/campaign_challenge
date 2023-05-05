<?php

namespace App\Services\Api\Campaign;


use App\Repositories\Campaign\CampaignRepository;
use App\Services\ServiceBase;

class CampaignService extends ServiceBase
{

    public function __construct(CampaignRepository $repository)
    {
        $this->repository = $repository;
    }

}
