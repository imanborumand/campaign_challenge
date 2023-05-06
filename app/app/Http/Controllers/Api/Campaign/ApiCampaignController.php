<?php

namespace App\Http\Controllers\Api\Campaign;

use App\Http\Requests\Api\Campaign\ParticipationToCampaignRequest;
use App\Http\Controllers\Controller;
use App\Jobs\Campaign\UserParticipationToCampaignJob;
use App\Services\Api\Campaign\CampaignService;
use Illuminate\Http\JsonResponse;


class ApiCampaignController extends Controller
{

    public function __construct(CampaignService $service)
    {
        $this->service = $service;
    }


    /**
     * @param ParticipationToCampaignRequest $request
     * @return JsonResponse
     */
    public function participationToCampaign(ParticipationToCampaignRequest $request) : JsonResponse
    {
       return $this->successResponse(__('participation campaign message'))
           ->setResult(
               $this->service->participationToCampaign($request->validated())
           )->setHttpCode(202)
            ->response();
    }

}
