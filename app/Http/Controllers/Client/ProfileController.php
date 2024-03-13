<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\ClientService;

class ProfileController extends Controller
{

    private $clientService;
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    public function index()
    {
        $logId = auth()->user()->id;
        $clients = Client::where('user_id', $logId)->get();
        return view('client.profile', compact('clients'));
    }

    public function edit($id)
    {

        $client = Client::find($id);

        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $ubah['name'] = $request->name;
        $ubah['contact_info'] = $request->contact_info;

        $result = $this->clientService->ClientProfileUpdate($ubah, $id);
        if ($result) {
            return redirect(route('client.account'))->with('success', 'Profile berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Update Gagal');
        }
    }
}
