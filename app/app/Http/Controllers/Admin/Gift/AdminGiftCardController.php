<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gift\AdminStoreGiftRequest;
use App\Services\Admin\Gift\AdminGiftCardService;

class AdminGiftCardController extends Controller
{

    public function __construct(AdminGiftCardService $service)
    {
        $this->service = $service;
    }



    public function store(AdminStoreGiftRequest $request)
    {

    }


}
