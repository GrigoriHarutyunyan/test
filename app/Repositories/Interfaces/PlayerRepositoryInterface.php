<?php

namespace App\Repositories\Interfaces;

use App\Models\Club;
use NamTran\LaravelMakeRepositoryService\Repository\RepositoryContract;

interface PlayerRepositoryInterface extends RepositoryContract
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getClubsForPlayer();

    /**
     * @param $data
     * @return mixed
     */
    public function save($data);

    /**
     * @param $id
     * @return mixed
     */
    public function getPlayerById($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
}
