<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;
use Spatie\Permission\Models\Role;


class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{

    /**
     * @var Role
     */
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
        parent::__construct();
    }

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
     */
    public function deleteRole($id){
        $user = $this->model
            ->where('id', $id)
            ->first();

        foreach ($user->roles as $role){
            return $this->model
                ->where('id', $id)
                ->first()
                ->removeRole($role->id);
        }
    }
}
