<?php

namespace App\Services;

use App\Repositories\AdminRepository;
use App\Services\Interfaces\AdminServiceInterface;

class AdminService implements AdminServiceInterface
{
    /**
     * @var AdminRepository
     */
    private $adminRepository;

    /**
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        return $this->adminRepository = $adminRepository;
    }

    public function getAllUsers()
    {
        return $this->adminRepository->all(['name', 'id']);
    }

    /**
     * Get User whose we want to give a role
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->adminRepository->find($id);
    }

    /**
     * save Role for user
     * @param $data
     * @return mixed
     */
    public function saveRole($data)
    {
        return $this->adminRepository->storeRole($data);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function removeRole($id){
        return $this->adminRepository->deleteRole($id);
    }
}
