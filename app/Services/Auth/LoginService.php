<?php

namespace App\Services\Auth;

use App\Repositories\AdminRepository;
use App\Services\Auth\LoginServiceInterface;
use Laravel\Socialite\Facades\Socialite;

class LoginService implements LoginServiceInterface
{

    /**
     * @var AdminRepository
     */
    private $adminRepository;

    /**
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository  $adminRepository)
    {
        return $this->adminRepository = $adminRepository;
    }

    /**
     * @return mixed
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $this->adminRepository->_registerOrLoginUser($user);
        return redirect()->route('index');
    }

}
