<?php

namespace App\Http\Requests\Admin\Campaign;

use App\Http\Requests\FormRequestBase;
use App\Models\Campaign\Campaign;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;


class GetParticipationUserListRequest extends FormRequestBase
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
            'code' => 'required|exists:campaigns,code',
        ];
    }


    /**
     * @param $keys
     * @return array
     */
    public function all( $keys = null ) : array
    {
        $request = request();
        $request['code'] = $request->code;
        return $request->toArray();
    }



}
