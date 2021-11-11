<?php

namespace App\Services;

use App\Repositories\PlayerRepository;
use App\Services\Interfaces\PlayerServiceInterface;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


class PlayerService implements PlayerServiceInterface
{
    /**
     * @var PlayerRepository
     */
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
         $this->playerRepository = $playerRepository;
    }

    /**
     * @return mixed
     */
    public function getAllPlayers()
    {
        return $this->playerRepository->getAll();
    }


    /**
     * @return mixed
     */
    public function getClubsForPlayer()
    {
        return $this->playerRepository->getClubsForPlayer();
    }

    /**
     * @return mixed
     */
    public function storePlayerData($data)
    {
        return $this->playerRepository->save($data);
    }

    public function getPlayerById($id)
    {
        return $this->playerRepository
            ->with('club')
            ->getPlayerById($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updatePlayer($data, $id)
    {
        return $this->playerRepository->updateById( $id, $data);
    }

    public function deletePlayer($id){
        return $this->playerRepository->deleteById($id);
    }
}
