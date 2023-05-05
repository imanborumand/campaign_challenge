<?php

namespace App\Exceptions;

use App\Concerns\ApiResponseTrait;
use Exception;

class StoreModelException extends Exception
{
    use ApiResponseTrait;


    public function __construct( string $message = "" , int $code = 0 , ?Throwable $previous = null )
    {
        parent::__construct( $message , $code , $previous );
    }


    public function render()
    {
        return $this->errorResponse(($this->message != '') ? $this->message : __('store model error'))
            ->setHttpCode(500)
            ->response();

    }

}
