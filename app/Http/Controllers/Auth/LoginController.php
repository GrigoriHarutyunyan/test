<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\LoginService;
use App\Services\Auth\LoginServiceInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @var LoginService
     */
    private $loginService;

    /**
     * @param LoginServiceInterface $loginService
     */
    public function __construct(LoginServiceInterface $loginService)
    {
        $this->middleware('guest')->except('logout');
         $this->loginService = $loginService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->loginService->redirectToGoogle();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handleGoogleCallback()
    {
        return $this->loginService->handleGoogleCallback();
    }
}
