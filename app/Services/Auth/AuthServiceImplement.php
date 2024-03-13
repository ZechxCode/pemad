<?php

namespace App\Services\Auth;

use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Client\ClientRepository;

class AuthServiceImplement extends Service implements AuthService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;
  protected $clientRepository;

  public function __construct(AuthRepository $mainRepository, ClientRepository $clientRepository)
  {
    $this->mainRepository = $mainRepository;
    $this->clientRepository = $clientRepository;
  }

  public function storeLogin($valreq)
  {
    // dd($valreq['email']);
    $user = $this->mainRepository->findUserByEmail($valreq['email']);
    if (!$user) {
      return ['success' => false, 'message' => 'User not found'];
    }
    if (Hash::check($valreq['password'], $user->password)) {
      Auth::login($user);
      return ['success' => true, 'redirect' => '/dashboard'];
    } else {
      return ['success' => false, 'message' => 'Invalid password'];
    }
  }

  public function storeRegister($valreq)
  {
    $user = $this->mainRepository->findUserByEmail($valreq['email']);
    if (!$user) {
      # code...
      $valreq['password'] = Hash::make($valreq['password']);
      $NewUs = $this->mainRepository->createUser($valreq);

      $client['user_id'] = $NewUs->id;
      $client['name'] = $NewUs->name;
      $client['contact_info'] = $NewUs->email;

      $this->clientRepository->create($client);

      return ['success' =>  true, 'message' => 'Berhasil Register', 'redirect' => 'login'];
    }
    return ['success' =>  false, 'message' => 'Email Sudah Terdaftar', 'redirect' => 'register'];
  }

  public function logout($request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();
  }
}
