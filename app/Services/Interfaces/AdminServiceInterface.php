<?php

namespace App\Services\Interfaces;

interface AdminServiceInterface
{
    /**
     * @return mixed
     */
    public function getAllUsers();

    /**
     * Get User whose we want to give a role
     * @param $id
     * @return mixed
     */
    public function getUser($id);

    /**
     * save Role for user
     * @param $data
     * @return mixed
     */
    public function saveRole($data);

    /**
     * remove role
     * @param $id
     * @return mixed
     */
    public function removeRole($id);
}
