<?php

namespace App\Repositories\Auth;

use LaravelEasyRepository\Repository;

interface AuthRepository extends Repository
{

    public function createUser($valreq);
    public function updateUser($valreq);
    public function findUser($valreq);
    public function deleteUser($id);
    public function findUserByEmail($valreq);
}
