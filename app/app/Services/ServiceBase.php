<?php

namespace App\Services;

use App\Exceptions\CustomNotfoundException;
use App\Exceptions\CustomStoreModelException;
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


    /**
     * create new model
     * @param array $params
     * @return Model|null
     * @throws CustomStoreModelException
     */
    public function store( array $params) : ?Model
    {
        return $this->repository->store($params);
    }
}
