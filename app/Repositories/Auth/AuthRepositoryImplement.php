<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Models\Client;
use App\Repositories\Auth\AuthRepository;
use LaravelEasyRepository\Implementations\Eloquent;

class AuthRepositoryImplement extends Eloquent implements AuthRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;


    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser($valreq)
    {
        return $this->model->create($valreq);
    }

    public function findUser($valreq)
    {
        return $this->model->find($valreq);
    }

    public function findUserByEmail($valreq)
    {
        return $this->model->where('email', $valreq)->first();
    }


    public function updateUser($valreq)
    {
        return $this->model->update($valreq);
    }

    public function deleteUser($id)
    {
        return $this->model->destroy($id);
    }
}
