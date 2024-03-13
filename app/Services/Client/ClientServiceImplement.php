<?php

namespace App\Services\Client;

use App\Repositories\Auth\AuthRepository;
use LaravelEasyRepository\Service;
use App\Repositories\Client\ClientRepository;

class ClientServiceImplement extends Service implements ClientService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;
  protected $authRepository;

  public function __construct(ClientRepository $mainRepository, AuthRepository $authRepository)
  {
    $this->mainRepository = $mainRepository;
    $this->authRepository = $authRepository;
  }

  // Define your custom methods :)
  public function ClientProfileUpdate($ubah, $id)
  {

    $client = $this->mainRepository->findClient($id);
    $clientUp = $client->update($ubah);
    if ($clientUp) {
      # code...
      $user = $this->authRepository->findUser($client->user_id);
      $ubahUser['name'] = $client->name;
      $ubahUser['email'] = $client->contact_info;
      $user->update($ubahUser);

      return [true, 'message' => 'Profile berhasil diperbarui'];
    } else {
      return [false, 'message' => 'Update Gagal'];
    }
  }

  public function ClientDestroy($id)
  {
    $client = $this->mainRepository->findClient($id);
    $delete = $client->delete();
    if ($delete) {
      $this->authRepository->deleteUser($client->user_id);
      return [true, 'message' => 'Deleted Successfully'];
    } else {
      return [false, 'message' => 'Delete Failed'];
    }
  }
}
