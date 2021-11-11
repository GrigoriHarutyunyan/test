<?php

namespace App\Repositories\Interfaces;

use NamTran\LaravelMakeRepositoryService\Repository\RepositoryContract;

interface CoachRepositoryInterface extends RepositoryContract
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getClubForCoaches();

    /**
     * @param $data
     * @return mixed
     */
    public function saveCoach($data);

    /**
     * @param $id
     * @return mixed
     */
    public function getCoachById($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
}
