<?php

namespace App\Services;

use App\Exceptions\CustomNotfoundException;
use App\Repositories\RepositoryBase;
use Illuminate\Database\Eloquent\Model;

class ServiceBase
{

    protected  RepositoryBase $repository;


    /**
     * @param int $id
     * @return Model
     * @throws CustomNotfoundException
     */
    public function get( int $id) : Model
    {
        return $this->repository->get($id);
    }
}
