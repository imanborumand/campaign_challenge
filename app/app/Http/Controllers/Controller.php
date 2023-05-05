<?php

namespace App\Http\Controllers;

use App\Service\ServiceBase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected ServiceBase $service;


    protected function apiResponse(
        mixed $response,
        string $message = 'success_request',
        int $httpCode = null
    ) : JsonResponse
    {
        return response()->json([
            'message' => $message,
            'result' => $response], $httpCode);
    }


}
