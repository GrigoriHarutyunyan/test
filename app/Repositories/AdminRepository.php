<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;
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

    /**
     * @param $data
     * @return mixed|void
     */
    public function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $data->user['given_name'];
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
