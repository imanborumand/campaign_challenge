<?php

namespace App\Services\Api\Campaign;


use App\Jobs\Campaign\UserParticipationToCampaignJob;
use App\Models\Campaign\Campaign;
use App\Repositories\Campaign\CampaignRepository;
use App\Services\ServiceBase;

class CampaignService extends ServiceBase
{

    public function __construct(CampaignRepository $repository)
    {
        $this->repository = $repository;
    }



    public function participationToCampaign(array $params)
    {
        dispatch(new UserParticipationToCampaignJob($params['mobile'], $params['code']));

        return true;
    }


    public function getByCode(string $code) : Campaign
    {
        return $this->repository->getByCode($code);
    }



}
