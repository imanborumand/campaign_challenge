<?php

namespace App\Http\Requests\Api\Campaign;

use App\Http\Requests\FormRequestBase;
use App\Models\Campaign\Campaign;
use App\Rules\Campaign\CheckCampaignTimeRule;
use Illuminate\Contracts\Validation\ValidationRule;


class ParticipationToCampaignRequest extends FormRequestBase
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'mobile' => ['required', 'regex:/(09)[0-9]{9}/'],
            'code' => ['required', 'string', 'max:' . Campaign::$MAX_CODE_LENGTH,  new CheckCampaignTimeRule()],
        ];
    }



}
