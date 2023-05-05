<?php

namespace App\Http\Controllers\Api\Campaign;

use App\Http\Requests\Api\Campaign\ParticipationToCampaignRequest;
use App\Http\Controllers\Controller;
use App\Services\Api\Campaign\CampaignService;


class ApiCampaignController
    extends Controller
{

    public function __construct(CampaignService $service)
    {
        $this->service = $service;
    }


    public function participationToCampaign(ParticipationToCampaignRequest $request)
    {
        dd($request->validated());
    }

}
