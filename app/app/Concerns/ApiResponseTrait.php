<?php

namespace App\Concerns;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{


    private array $errors = [];

    private  string $responseMessage = "";

    private mixed $result = [];


    private int $httpCode = 200;


    public function response() : JsonResponse
    {
        return response()->json([
            'message' => $this->responseMessage,
            'result' => $this->result,
            'errors' => $this->errors
                                ], $this->httpCode);
    }


    public function setResult(mixed $result) : static
    {
        $this->result = $result;
        return $this;
    }

    public function setErrors(array $array) : static
    {
        $this->errors = $array;
        return $this;
    }


    public function errorResponse(string $message = 'error') : static
    {
        $this->responseMessage = $message;
        return $this;
    }

    public function successResponse(string $message = 'success response') : static
    {
        $this->responseMessage = $message;
        return $this;
    }

    public function setHttpCode( int $httpCode ) : static
    {
        $this->httpCode = $httpCode;
        return $this;
    }

}
