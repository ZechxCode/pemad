<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\ServiceOffer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin.project', compact('projects'));
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        $project = Project::where('client_id', $client->id)->get();
        // $inv = Invoice::where('project_id', $project->id)->first();

        return view('client.project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('admin.project_edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update['name'] = $request->name;
        $update['description'] = $request->description;
        $update['status'] = $request->status;

        $project = Project::find($id);
        $project->update($update);

        return redirect()->route('admin.project')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        Invoice::where('project_id', $project->id)->delete();
        $project->delete();
        ServiceOffer::destroy($project->service_offer_id);

        return redirect()->route('admin.project')->with('success', 'Successfully deleted');
    }
}
