<?php

namespace App\Exceptions;

use App\Concerns\ApiResponseTrait;
use App\Exceptions\Throwable;
use Exception;
use Illuminate\Http\JsonResponse;

class CustomCampaignTimeException extends Exception
{
    use ApiResponseTrait;

    protected array $errorsValue;


    public function __construct( string $message = "" , int $code = 0 , ?Throwable $previous = null )
    {
        parent::__construct( $message , $code , $previous );
    }


    /**
     * @return JsonResponse
     */
    public function render() : \Illuminate\Http\JsonResponse
    {
        return $this->errorResponse(($this->message != '') ? $this->message : __('campaign time error'))
            ->setHttpCode(400)
            ->response();

    }

}
