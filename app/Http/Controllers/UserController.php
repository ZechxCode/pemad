<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\AuthService;

class UserController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function login()
    {
        return view('auth.login');
    }
    public function storeLogin(LoginRequest $loginRequest)
    {
        // dd($loginRequest);
        $valreq = $loginRequest->validated();

        $result = $this->authService->storeLogin($valreq);

        if ($result['success']) {
            return redirect($result['redirect']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
    public function register()
    {
        return view('auth.register');
    }
    public function storeRegister(RegisterRequest $registerRequest)
    {
        $valreq = $registerRequest->validated();
        $result = $this->authService->storeRegister($valreq);

        if ($result['success']) {
            return redirect($result['redirect'])->with('success', $result['message']);
        } else {
            return redirect($result['redirect'])->with('errors', $result['message']);
        }
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect("/login")->with("success", "Berhasil logout");
    }
}
