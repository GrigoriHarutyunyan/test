<?php

namespace App\Repositories\Interfaces;

use NamTran\LaravelMakeRepositoryService\Repository\RepositoryContract;


interface ClubRepositoryInterface extends RepositoryContract
{
    /**
     * @return mixed
     */
    public function getAllClub();

    /**
     * @param $data
     * @return mixed
     */
    public function save($data);

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
}

