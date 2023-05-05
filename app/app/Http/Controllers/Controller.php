<?php

namespace App\Http\Controllers;


use App\Concerns\ApiResponseTrait;
use App\Services\ServiceBase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponseTrait;


    protected ServiceBase $service;





}
