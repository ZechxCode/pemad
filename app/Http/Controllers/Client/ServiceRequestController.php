<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;

class ServiceRequestController extends Controller
{
    public function create()
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        $project = Project::where('client_id', $client->id)->get();
        // dd($project);

        return view('client.serviceReq_create', compact('client', 'project'));
    }

    public function storeReq(Request $request)
    {
        // dd($request);
        $data['client_id'] = $request->client_id;
        $data['project_ref'] = $request->project_ref;
        $data['description'] = $request->description;

        ServiceRequest::create($data);

        return redirect()->route('client.dashboard');
    }

    public function edit($id)
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        $project = Project::where('client_id', $client->id)->get();
        $serviceReq = ServiceRequest::find($id);
        return view('client.serviceReq_edit', compact('serviceReq', 'project'));
    }

    public function update(Request $request, $id)
    {
        $update['project_ref'] = $request->project_ref;
        $update['description'] = $request->description;

        $reqUpdate = ServiceRequest::find($id)->update($update);
        if ($reqUpdate) {
            # code...
            return redirect()->route('client.dashboard')->with('success', 'Service Request Berhasil di Update');
        } else {
            return redirect()->route('client.dashboard')->with('error', 'Fail');
        }
    }
}
