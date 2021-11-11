<?php

namespace App\Services\Interfaces;

interface CoachServiceInterface
{
    /**
     * @return mixed
     */
    public function getAllCoaches();

    /**
     * @return mixed
     */
    public function getClubs();

    /**
     * @return mixed
     */
    public function saveCoach($data);

    /**
     * @param $id
     * @return mixed
     */
    public function showCoach($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateCoach($data, $id);

    public function deleteCoach($id);
}
