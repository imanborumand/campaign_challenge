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


}
