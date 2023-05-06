<?php

namespace App\Services\Admin\Campaign;


use App\Exceptions\CustomStoreModelException;
use App\Models\Campaign\Campaign;
use App\Repositories\Campaign\CampaignRepository;
use App\Services\ServiceBase;
use Illuminate\Database\Eloquent\Model;

class AdminCampaignService extends ServiceBase
{


    public function __construct(CampaignRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param array $params
     * @return Model
     * @throws CustomStoreModelException
     */
    public function store( array $params) : Model
    {
        return $this->repository->store($params);
    }


    /**
     * @param string $code
     * @return bool|Campaign
     */
    public function getParticipationUsersList( string $code) : bool|Campaign
    {
        if ($this->repository->getCountOfParticipation($code)?->users_count == 0) {
            return false;
        }

        return $this->repository->getWithUsers($code);
    }
}
