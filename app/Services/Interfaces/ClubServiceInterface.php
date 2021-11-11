<?php

namespace App\Services\Interfaces;

interface ClubServiceInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $data
     * @return mixed
     */
    public function storeClubData($data);

    /**
     * @param $id
     * @return mixed
     */
    public function  getById($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateClubById($data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteClub($id);

}
