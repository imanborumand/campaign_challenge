<?php

namespace App\Repositories;


use App\Exceptions\CustomStoreModelException;
use Illuminate\Database\Eloquent\Model;

class RepositoryBase
{

    protected Model $model;


    /**
     * @param array $params
     * @return Model
     * @throws CustomStoreModelException
     */
    public function store( array $params) : Model
    {
       $model = $this->model->create($params);
       if($model) {
           return $model;
       }
        throw new CustomStoreModelException();
    }
}
