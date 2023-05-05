<?php

namespace App\Http\Requests\Admin\Gift;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreGiftRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'start_time' => 'required|date_format:Y-m-d H:i',
            'usable_number' => 'required|numeric|min:1',
            'usable_time' => 'required|numeric|min:1' //Gift code expiration time
        ];
    }
}
