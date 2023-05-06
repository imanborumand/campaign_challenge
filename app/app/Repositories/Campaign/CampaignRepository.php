<?php

namespace App\Repositories\Campaign;

use App\Exceptions\CustomNotfoundException;
use App\Models\Campaign\Campaign;

use App\Repositories\RepositoryBase;

class CampaignRepository extends RepositoryBase
{


    public function __construct(Campaign $model)
    {
        $this->model = $model;
    }


    /**
     * @param string $code
     * @return Campaign
     * @throws CustomNotfoundException
     */
    public function getByCode( string $code) : Campaign
    {
        $campaign = $this->model->where('code', $code)->first();
        if ($campaign) {
            return $campaign;
        }
        throw new CustomNotfoundException();
    }


    /**
     * check and get campaign by userId and campaign code
     * if user not participation on campaign return null
     * @param string $code
     * @param int    $userId
     * @return Campaign|null
     */
    public function checkUserParticipationOnCampaign( string $code, int $userId) : ? Campaign
    {
        return $this->model->where('code', $code)
            ->whereHas('users', function($query) use ($userId) {
                $query->where('user_id', $userId);
            })->first();
    }


    /**
     * @param int   $id
     * @param array $params
     * @return array|null
     */
    public function syncNewUser( int $id, array $params) : ?array
    {
        $campaign = $this->model->where('id', $id)->first();
        if($campaign) {
            return $campaign->users()->sync($params);
        }
        return null;
    }

}
