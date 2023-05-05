<?php

namespace App\Repositories\Campaign;

use App\Models\Campaign\Campaign;

use App\Repositories\RepositoryBase;

class CampaignRepository extends RepositoryBase
{


    public function __construct(Campaign $model)
    {
        $this->model = $model;
    }




}
