<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\Player;
use App\Repositories\Interfaces\PlayerRepositoryInterface;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    private $club;
    public function __construct(Club $club)
    {
        $this->club = $club;
        parent::__construct();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Player::class;
    }


    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->newQuery()->get();
    }


    /**
     * @return mixed
     */
    public function getClubsForPlayer()
    {
        return $this->club->select('id','name')->get();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @return PlayerRepository|PlayerRepository[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getPlayerById($id)
    {
        return $this->newQuery()
            ->where('id', $id)
            ->first();
    }
}
