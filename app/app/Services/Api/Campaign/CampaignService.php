<?php

namespace App\Services\Api\Campaign;


use App\Exceptions\CustomNotfoundException;
use App\Jobs\Campaign\UserParticipationToCampaignJob;
use App\Models\Campaign\Campaign;
use App\Models\User\User;
use App\Repositories\Campaign\CampaignRepository;
use App\Services\ServiceBase;
use Illuminate\Support\Facades\DB;

class CampaignService extends ServiceBase
{

    public function __construct(CampaignRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param array $params
     * @return array
     */
    public function participationToCampaign( array $params) : array
    {
        dispatch(new UserParticipationToCampaignJob($params['mobile'], $params['code']));

        return [];
    }


    /**
     * check user participation on selected camp!
     * @param string $code
     * @param int    $userId
     * @return Campaign|null
     */
    public function checkUserParticipation( string $code, int $userId) : ?Campaign
    {
        return $this->repository->checkUserParticipationOnCampaign($code, $userId);
    }


    /**
     * get campaign by code
     * @param string $code
     * @return Campaign
     * @throws CustomNotfoundException
     */
    public function getByCode( string $code) : Campaign
    {
        return $this->repository->getByCode($code);
    }


    /**
     * @param int   $id
     * @param array $params
     * @return array|null
     */
    public function attachNewUser( int $id, array $params) : ?array
    {
        return $this->repository->attachNewUser($id, $params);
    }


}
