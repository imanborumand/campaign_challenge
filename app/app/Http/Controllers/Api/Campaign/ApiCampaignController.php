<?php

namespace App\Http\Controllers\Api\Campaign;

use App\Http\Requests\Api\Campaign\ParticipationToCampaignRequest;
use App\Http\Controllers\Controller;
use App\Jobs\Campaign\UserParticipationToCampaignJob;
use App\Services\Api\Campaign\CampaignService;


class ApiCampaignController extends Controller
{

    public function __construct(CampaignService $service)
    {
        $this->service = $service;
    }


    public function participationToCampaign(ParticipationToCampaignRequest $request)
    {
       //todo add job for add use to campaign

    }

}
