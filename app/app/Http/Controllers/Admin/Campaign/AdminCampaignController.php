<?php

namespace App\Http\Controllers\Admin\Campaign;


use App\Exceptions\CustomStoreModelException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Campaign\AdminStoreCampaignRequest;
use App\Http\Requests\Admin\Campaign\GetParticipationUserListRequest;
use App\Http\Requests\Admin\Gift\AdminStoreGiftRequest;
use App\Http\Resources\Admin\Campaign\CampaignResource;
use App\Http\Resources\Admin\Gift\GiftResource;


use App\Http\Resources\Admin\User\UserResource;
use App\Services\Admin\Campaign\AdminCampaignService;
use Illuminate\Http\JsonResponse;

class AdminCampaignController extends Controller
{

    public function __construct(AdminCampaignService $service)
    {
        $this->service = $service;
    }


    /**
     * @param AdminStoreCampaignRequest $request
     * @return JsonResponse
     * @throws CustomStoreModelException
     */
    public function store( AdminStoreCampaignRequest $request) : JsonResponse
    {
        return $this->successResponse()
            ->setResult(
                new CampaignResource($this->service->store($request->validated()))
            )
            ->response();
    }


    /**
     * show list of user that used campaign
     * @param GetParticipationUserListRequest $request
     * @return JsonResponse
     */
    public function getParticipationUsersList( GetParticipationUserListRequest $request) : JsonResponse
    {

        return $this->successResponse()
                    ->setResult(
                        UserResource::collection(
                            $this->service->getParticipationUsersList($request->code)->users ?? [])
                    )->response();
    }


}
