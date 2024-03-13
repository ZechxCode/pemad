<?php

namespace App\Repositories\Client;

use LaravelEasyRepository\Repository;

interface ClientRepository extends Repository
{

    // Write something awesome :)
    public function create($valreq);
    public function findClient($valreq);
}
