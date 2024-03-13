<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Models\ServiceOffer;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        $serviceReq = ServiceRequest::where('client_id', $client->id)->get();
        $serviceOff = ServiceOffer::where('client_id', $client->id)->get();
        // dd($serviceReq);
        return view('client.dashboard', compact('serviceReq', 'serviceOff'));
    }
}
