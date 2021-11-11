<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\Coach;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;
use App\Repositories\Interfaces\CoachRepositoryInterface;

class CoachRepository extends BaseRepository implements CoachRepositoryInterface
{

    /**
     * @var Club
     */
    private $club;

    /**
     * @param Club $club
     */
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
        return Coach::class;
    }

    /**
     * @return CoachRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->newQuery()->get();
    }

    /**
     * @return mixed
     */
    public function getClubForCoaches()
    {
        return $this->club->select('id', 'name')->get();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function saveCoach($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @return CoachRepository[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getCoachById($id)
    {
        return $this->newQuery()
            ->where('id', $id)
            ->first();
    }
}
