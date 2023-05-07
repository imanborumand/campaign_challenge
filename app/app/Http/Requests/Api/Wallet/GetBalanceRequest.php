<?php

namespace App\Http\Requests\Api\Wallet;

use App\Http\Requests\FormRequestBase;
use App\Models\Campaign\Campaign;
use App\Rules\Campaign\CheckCampaignTimeRule;
use Illuminate\Contracts\Validation\ValidationRule;


class GetBalanceRequest extends FormRequestBase
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
            'mobile' => ['required', 'regex:/(09)[0-9]{9}/', 'exists:users,mobile'],
        ];
    }


    /**
     * @param $keys
     * @return array
     */
    public function all( $keys = null ) : array
    {
        $request = request();
        $request['mobile'] = $request->mobile;
        return $request->toArray();
    }


}
