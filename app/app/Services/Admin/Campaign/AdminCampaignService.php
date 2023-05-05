<?php

namespace App\Services\Admin\Campaign;


use App\Exceptions\CustomStoreModelException;
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
}
