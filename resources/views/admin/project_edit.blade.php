@extends('layout.sidebar')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Project Edit</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.project.update', $project->id) }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">ID</label>
                    <input type="text" name="id" class="form-control" value="{{ $project->id }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="">Client</label>
                    <input type="text" name="client_id" class="form-control" value="{{ $project->client->name }}"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="">Service Offer ID</label>
                    <input type="text" name="service_offer_id" class="form-control"
                        value="{{ $project->service_offer_id }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $project->name }}">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $project->description }}">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select" name="status" required>
                        {{-- <option value="">Select</option> --}}
                        <option value="{{ $project->status }}" selected>{{ $project->status }}</option>
                        <option value="Active">Active</option>
                        <option value="Done">Done</option>
                        <option value="Decline">Decline</option>
                    </select>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
