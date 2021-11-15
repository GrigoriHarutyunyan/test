<?php

namespace App\Services\Auth;

interface LoginServiceInterface
{
    /**
     * @return mixed
     */
    public function redirectToGoogle();

    /**
     * @return mixed
     */
    public function handleGoogleCallback();
}
