<?php

namespace App\Exceptions;

use App\Concerns\ApiResponseTrait;
use App\Exceptions\Throwable;
use Exception;
use Illuminate\Http\JsonResponse;

class CustomValidationException extends Exception
{
    use ApiResponseTrait;

    protected array $errorsValue;


    public function __construct( string $message = "" , array $errors = [], int $code = 0 , ?Throwable $previous = null )
    {
        parent::__construct( $message , $code , $previous );
        $this->errorsValue = $errors;
    }


    /**
     * @return JsonResponse
     */
    public function render() : \Illuminate\Http\JsonResponse
    {
        return $this->errorResponse(($this->message != '') ? $this->message : __('validation error'))
            ->setErrors($this->errorsValue)
            ->setHttpCode(422)
            ->response();

    }

}
