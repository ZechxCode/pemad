<?php

namespace App\Http\Controllers\Client;

use App\Models\Project;
use App\Models\ServiceOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceOfferController extends Controller
{
    public function update(Request $request, $id)
    {
        $update['status'] = $request->status;
        $serviceOff = ServiceOffer::find($id);
        $serviceOff->update($update);
        $alert = "";
        $message = "";
        if ($update['status'] == 'Accept') {

            $pro['client_id'] = $serviceOff->client_id;
            $pro['service_offer_id'] = $serviceOff->id;
            $pro['name'] =  $serviceOff->offer;
            $pro['description'] = $serviceOff->client_request;;
            $pro['status'] = 'Waiting For Payment ( DP )';
            Project::create($pro);

            $alert = 'success';
            $message = 'Offer Accepted,Waiting for Payment ( DP )';
        } else {
            $alert = 'errorx';
            $message = 'Offer Declined';
        }
        return redirect(route('client.dashboard'))->with($alert, strtoupper($message));
    }

    public function destroy($id)
    {
        ServiceOffer::destroy($id);
        return redirect(route('client.dashboard'))->with('success', 'Deleted Succesfully');
    }
}
