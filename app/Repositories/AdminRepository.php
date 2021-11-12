<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;
use Spatie\Permission\Models\Role;


class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @param $data
     * @return mixed
     */

    public function storeRole($data){
        return $this->model
                ->where('id', $data['id'])
                ->first()
                ->assignRole($data['name']);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRole($id){
        return $this->model
                ->where('id', $id)
                ->first()
                ->syncRoles([]);
    }
}
