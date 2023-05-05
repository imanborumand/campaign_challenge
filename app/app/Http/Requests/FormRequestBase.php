<?php

namespace App\Http\Requests;

use App\Exceptions\CustomValidationException;
use App\Concerns\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class FormRequestBase extends FormRequest
{

    use ApiResponseTrait;


    /**
     * @param Validator $validator
     * @return mixed
     * @throws CustomValidationException
     */
    protected function failedValidation( Validator $validator )
    {
        $errors = [];
        foreach ($validator?->errors()?->messages() as $error) {
            $errors[] = $error;
        }

        throw new CustomValidationException(
            errors: $errors
        );
    }
}
