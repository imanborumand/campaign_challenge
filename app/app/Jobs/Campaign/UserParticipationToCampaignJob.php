<?php

namespace App\Jobs\Campaign;

use App\Enums\Wallet\TransactionReasonEnum;
use App\Enums\Wallet\TransactionTypeEnum;
use App\Exceptions\CustomNotfoundException;
use App\Exceptions\CustomStoreModelException;
use App\Models\Campaign\Campaign;
use App\Models\User\User;
use App\Services\Api\Campaign\CampaignService;
use App\Services\Api\User\UserService;
use App\Services\Api\Wallet\WalletService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

/**
 * This job will check the participation or non-participation of the user in a campaign and
 * if the user does not participate in the campaign, it will join the campaign after checking.
 * If the campaign has ended or the maximum number of participants has been reached.
 * This job will have no result and will not add the user to the campaign.
 */
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

        DB::beginTransaction();
        try {

            $this->getUser(); //get user

            //if this function return result, user participation on this campaign
            //if return has value, it means that the user has participated in the campaign
            if ($this->campaignService->checkUserParticipation($this->code, $this->user->id)) {
                return;
            }

            //sync user and add to current campaign
            $this->campaignService->attachNewUser($this->campaign->id, ['user_id' => $this->user->id]);

            //add campaign amount to wallet
            $this->addCampaignAmountToWallet();
            DB::commit();

        } catch (Exception) {
            DB::rollBack();
            //retry job
        }


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
     * @throws CustomStoreModelException
     */
    private function getUser() : void
    {
        $this->user = $this->userService->getByMobileNumber($this->mobile);
        if (!$this->user) {
            $this->user = $this->userService->store(['mobile' => $this->mobile]);
        }
    }


    /**
     * @return void
     */
    private function addCampaignAmountToWallet() : void
    {
        app(WalletService::class)
            ->store([
                        'user_id' => $this->user->id,
                        'amount' => $this->campaign->amount,
                        'type' => TransactionTypeEnum::INCREASE->value,
                        'reason' => TransactionReasonEnum::FROM_CAMPAIGN->value
                    ]);
    }
}
