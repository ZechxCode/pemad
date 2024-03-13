<?php

namespace App\Services\Client;

use LaravelEasyRepository\BaseService;

interface ClientService extends BaseService
{
    public function ClientProfileUpdate($ubah, $id);
    public function ClientDestroy($id);
}
