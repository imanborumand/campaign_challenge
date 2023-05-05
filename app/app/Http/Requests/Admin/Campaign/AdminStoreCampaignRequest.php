<?php

namespace App\Http\Requests\Admin\Campaign;

use App\Http\Requests\FormRequestBase;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;


class AdminStoreCampaignRequest extends FormRequestBase
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
            'code' => 'required|unique:campaigns,code|max:5',
            'start_time' => 'required|date_format:Y-m-d H:i|after:now',
            'end_time' => 'required|after:now',
            'usable_number' => 'required|numeric|min:1',
            'usable_time' => 'required|numeric|min:1' //Gift code expiration time (per sec)
        ];
    }


    /**
     * @param $keys
     * @return array
     */
    public function all( $keys = null ) : array
    {
        $request = request();

        //create end time for start_time and attach to request value
        $defaultTime = config('app.default_gift_card_usable_time');
        $request['end_time'] = Carbon::createFromFormat('Y-m-d H:i', $request->start_time)
                                   ->addMinutes(request()->usable_time ?? $defaultTime);

        return $request->toArray();
    }



}
