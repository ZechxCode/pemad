<?php

namespace App\Services\Auth;

use LaravelEasyRepository\BaseService;

interface AuthService extends BaseService
{

    public function storeLogin($valreq);

    public function storeRegister($valreq);
    public function logout($request);
}
