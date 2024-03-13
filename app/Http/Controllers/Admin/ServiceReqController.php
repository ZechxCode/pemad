<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use App\Models\ServiceOffer;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;

class ServiceReqController extends Controller
{
    public function serviceList()
    {
        $serviceReq = ServiceRequest::paginate(5);
        $serviceOff = ServiceOffer::where('status', '!=', 'decline')->paginate(5);
        return view('admin.service_list', compact('serviceReq', 'serviceOff'));
    }

    public function edit($id)
    {
        $serviceReq = ServiceRequest::find($id);
        $project = Project::where('client_id', $serviceReq->client_id)->get();
        return view('admin.serviceReq_edit', compact('serviceReq', 'project'));
    }
    public function update(Request $request, $id)
    {
        // $update['client_id'] = $request->client_id;
        $update['project_ref'] = $request->project_ref;
        $update['description'] = $request->description;
        $update['status'] = $request->status;

        $reqUpdate = ServiceRequest::find($id)->update($update);
        if ($reqUpdate) {
            # code...
            return redirect()->route('admin.serviceReq')->with('success', 'Service Request Berhasil di Update');
        } else {
            return redirect()->route('admin.serviceReq')->with('error', 'Fail');
        }
    }
    public function destroy($id)
    {
        ServiceRequest::destroy($id);

        return redirect()->route('admin.serviceReq')->with('success', 'Successfully deleted!');
    }
}
