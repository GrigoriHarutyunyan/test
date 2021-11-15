<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\AdminService;


class AdminController extends Controller
{
    /**
     * @var AdminService
     */
    private $adminService;

    /**
     * @param AdminServiceInterface $adminService
     */
    public function __construct(AdminServiceInterface $adminService)
    {
        return $this->adminService = $adminService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAllUsers()
    {
        $users = $this->adminService->getAllUsers();
        return view('admin.index', compact('users'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function giveRole($id)
    {

        $user = $this->adminService->getUser($id);
        return view('admin.roles', compact('user'));
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRole(RoleRequest $request)
    {
        $data = $request->all();
        $user = $this->adminService->getUser($data['id']);
        if(!$user->hasAnyRole('admin', 'coach', 'player')){
            $this->adminService->saveRole($data);
        }
        return redirect()->route('admin.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $this->adminService->removeRole($id);
        return redirect()->route('admin.index');
    }
}
