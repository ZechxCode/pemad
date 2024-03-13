@extends('layout.template')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Create Invoice</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('client.project.invoice.store') }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">Project ID</label>
                    <input type="text" class="form-control" value="{{ $project->id }}" disabled>
                    <input type="hidden" name="project_id" class="form-control" value="{{ $project->id }}">
                </div>
                <div class="mb-3">
                    <label for="">Client</label>
                    <input type="text" class="form-control" value="{{ $project->client->name }}" disabled>
                    <input type="hidden" name="client_id" class="form-control" value="{{ $project->client_id }}">
                </div>

                <div class="mb-3">
                    <label for="">Total Amount</label>
                    <input type="text" class="form-control" value="{{ $project->serviceOffer->estimated_price }}"
                        disabled>
                    <input type="hidden" name="total_amount" class="form-control"
                        value="{{ $project->serviceOffer->estimated_price }}">
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Continue</button>
            </form>
        </div>
    </div>
@endsection
