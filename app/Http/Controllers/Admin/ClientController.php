<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Client\ClientService;

class ClientController extends Controller
{

    private $authService, $clientService;
    public function __construct(AuthService $authService, ClientService $clientService)
    {
        $this->authService = $authService;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = Client::paginate(5);
        return view('admin.client', compact('clients'));
    }

    public function create()
    {
        return view('admin.client_create');
    }

    public function store(RegisterRequest $registerRequest)
    {
        $valreq = $registerRequest->validated();
        $result = $this->authService->storeRegister($valreq);

        if ($result['success']) {
            return redirect()->route('admin.client.managament')->with('success', $result['message']);
        } else {
            return redirect()->route('admin.client.managament')->with('errors', $result['message']);
        }
    }

    public function edit($id)
    {
        $client = Client::find($id);

        return view('admin.client_edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $ubah['name'] = $request->name;
        $ubah['contact_info'] = $request->contact_info;

        $result = $this->clientService->ClientProfileUpdate($ubah, $id);
        if ($result) {
            return redirect(route('admin.client.managament'))->with('success', $result['message']);
        } else {
            return redirect()->route('admin.client.managament')->with('errors', $result['message']);
        }
    }

    public function destroy($id)
    {
        $result = $this->clientService->ClientDestroy($id);
        if ($result) {
            return redirect()->route('admin.client.managament')->with('success', $result['message']);
        } else {
            return redirect()->route('admin.client.managament')->with('errors', $result['message']);
        }
    }
}
