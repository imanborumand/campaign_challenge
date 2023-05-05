<?php

namespace App\Http\Requests;

use App\Exceptions\CustomValidationException;
use App\Concerns\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class FormRequestBase extends FormRequest
{

    use ApiResponseTrait;



    protected function failedValidation( Validator $validator )
    {
        throw new CustomValidationException(
            errors: $validator->errors()?->messages()['code']
        );
    }
}
