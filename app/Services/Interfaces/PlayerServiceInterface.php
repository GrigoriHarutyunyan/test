<?php

namespace App\Services\Interfaces;

interface PlayerServiceInterface
{
    /**
     * @return mixed
     */
    public function getAllPlayers();

    /**
     * @return mixed
     */
   public function getClubsForPlayer();

    /**
     * @param $data
     * @return mixed
     */
   public function storePlayerData($data);

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
   public function updatePlayer($data, $id);

    /**
     * @param $id
     * @return mixed
     */
   public function deletePlayer($id);
}
