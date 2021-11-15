<?php

namespace App\Repositories\Interfaces;

use NamTran\LaravelMakeRepositoryService\Repository\RepositoryContract;

interface AdminRepositoryInterface extends RepositoryContract
{
    /**
     * Save role for user
     * @param $data
     * @return mixed
     */
    public function storeRole($data);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRole($id);

    /**
     * @param $data
     * @return mixed
     */
    public function  _registerOrLoginUser($data);

}
