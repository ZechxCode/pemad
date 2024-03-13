<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceOffer;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;

class ServiceOffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $serviceReq = ServiceRequest::find($id);
        return view('admin.serviceOff_create', compact('serviceReq'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['service_request_id'] = $request->service_request_id;
        $data['client_id'] = $request->client_id;
        $data['client_request'] = $request->client_request;
        $data['offer'] = $request->offer;
        $data['estimated_price'] = $request->estimated_price;
        $data['down_payment'] = $request->estimated_price * $request->down_payment / 100;

        $ServiceOffUpdate = ServiceOffer::create($data);

        if ($ServiceOffUpdate) {
            $serviceReq['status'] = 'Sending Offer';
            ServiceRequest::where('id', $request->service_request_id)->update($serviceReq);
            return redirect()->route('admin.serviceReq')->with('success', 'Offer Send');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
