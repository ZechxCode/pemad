@extends('layout.template')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Edit Service Request</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('client.serviceReq.update', $serviceReq->id) }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">Client</label>
                    <input type="text" class="form-control" value="{{ $serviceReq->client->name }}" disabled>
                    <input type="hidden" name="client_id" class="form-control" value="{{ $serviceReq->id }}">
                </div>

                <div class="mb-3">
                    <label>Project ref</label>
                    <select class="form-select" name="project_ref" required>
                        {{-- <option value="">Select</option> --}}
                        @if ($serviceReq->project_ref == 0)
                            <option value="{{ $serviceReq->project_ref }}" selected>New</option>
                        @endif

                        @if ($project->isNotEmpty())
                            @foreach ($project as $pro)
                                <option value="{{ $pro->id }}">
                                    {{ $pro->id }} || {{ $pro->name }}
                                </option>
                            @endforeach
                            <option value="0">
                                New
                            </option>
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $serviceReq->description }}">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
