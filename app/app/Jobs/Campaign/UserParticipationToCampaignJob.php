<?php

namespace App\Jobs\Campaign;

use App\Exceptions\CustomNotfoundException;
use App\Exceptions\CustomStoreModelException;
use App\Models\Campaign\Campaign;
use App\Models\User\User;
use App\Services\Api\Campaign\CampaignService;
use App\Services\Api\User\UserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;



class UserParticipationToCampaignJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private CampaignService $campaignService;

    private Campaign $campaign;

    private ?User $user = null;

    private UserService $userService;


    /**
     * Create a new job instance.
     */
    public function __construct(private string $mobile, private string $code)
    {
        $this->campaignService = app(CampaignService::class);
        $this->userService = app(UserService::class);
    }


    /**
     * @return void
     * @throws CustomNotfoundException
     * @throws CustomStoreModelException
     */
    public function handle(): void
    {
        if ($this->checkUsedStatusOfCampaign()) {
            //clear cache when used arrived to max for return error in request
            Cache::forget($this->campaign->code);
            return;
        }

        $this->getUser(); //get user

        //if this function return result, user participation on this campaign
        //if return has value, it means that the user has participated in the campaign
        if ($this->campaignService->checkUserParticipation($this->code, $this->user->id)) {
           return;
        }

        //sync user and add to current campaign
        $this->campaignService->syncNewUser($this->campaign->id, ['user_id' => $this->user->id]);
    }


    /**
     * check if used was max return => campaign end!
     *
     * @return bool
     * @throws CustomNotfoundException
     */
    private function checkUsedStatusOfCampaign() : bool
    {
        $this->campaign = $this->campaignService->getByCode($this->code);

        return $this->campaign->used_number == $this->campaign->usable_number;
    }


    /**
     * @return void
     * @throws CustomNotfoundException
     * @throws CustomStoreModelException
     */
    private function getUser() : void
    {
        $this->user = $this->userService->getByMobileNumber($this->mobile);
        if (!$this->user) {
            $this->user = $this->userService->store(['mobile' => $this->mobile]);
        }
    }
}
