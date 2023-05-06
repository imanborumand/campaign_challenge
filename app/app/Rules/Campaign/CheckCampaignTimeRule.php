<?php

namespace App\Rules\Campaign;

use App\Exceptions\CustomCampaignTimeException;
use App\Services\Api\Campaign\CampaignService;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Translation\PotentiallyTranslatedString;

/**
 * This rule uses the code of each campaign to check whether the request is sent at the right time or not.
 * Data is cached after the first request until the end of the campaign.
 *If the request is not at the right time, an error message will be returned to the user
 * and the request will be prevented from being sent to lower layers
 */
class CheckCampaignTimeRule implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param string                                       $attribute
     * @param mixed                                        $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     * @throws CustomCampaignTimeException
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //Add to the cache to receive from the cache and not send a query to the database
        $campaignCache = Cache::get($value, function() use ($value) {

            $campaign = app(CampaignService::class)->getByCode($value);
            Cache::put($value, $campaign, $campaign->end_time);

            return $campaign;
        });


        //If the request time is not between the start and end time of the campaign,
        // a CustomCampaignTimeException will be issued
        if (
            !Carbon::now()->between($campaignCache->start_time, $campaignCache->end_time) ||
            $campaignCache->used_number == $campaignCache->usable_number
        ) {
            throw new CustomCampaignTimeException();
        }
    }
}
