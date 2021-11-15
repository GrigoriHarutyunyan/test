<?php

namespace App\Repositories;

use App\Models\Club;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;
use App\Repositories\Interfaces\ClubRepositoryInterface;

class ClubRepository extends BaseRepository implements ClubRepositoryInterface
{
    /**
     * @return string
     */
    public function model()
    {
        return Club::class;
    }

    /**
     * @return ClubRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllClub()
    {
        return $this->newQuery()->get();
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
     * @return ClubRepository[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getById($id)
    {
        return $this->newQuery()
            ->where('id', $id)
            ->first();
    }

}
