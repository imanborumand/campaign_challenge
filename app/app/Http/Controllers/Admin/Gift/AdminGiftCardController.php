<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Exceptions\StoreModelException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gift\AdminStoreGiftRequest;
use App\Http\Resources\Admin\Gift\GiftResource;
use App\Services\Admin\Gift\AdminGiftCardService;
use Illuminate\Http\JsonResponse;

class AdminGiftCardController extends Controller
{

    public function __construct(AdminGiftCardService $service)
    {
        $this->service = $service;
    }


    /**
     * @param AdminStoreGiftRequest $request
     * @return JsonResponse
     * @throws StoreModelException
     */
    public function store( AdminStoreGiftRequest $request) : JsonResponse
    {
        return $this->successResponse()
            ->setResult(
                new GiftResource($this->service->store($request->validated()))
            )
            ->response();
    }


}
