@extends('layout.sidebar')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Edit Service Request</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.serviceReq.update', $serviceReq->id) }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">Client</label>
                    <input type="text" class="form-control" value="{{ $serviceReq->client->name }}" disabled>
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


                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select" name="status" required>
                        {{-- <option value="">Select</option> --}}
                        <option value="{{ $serviceReq->status }}" selected>{{ $serviceReq->status }}</option>
                        <option value="In Review">In Review</option>
                        <option value="Pending">Pending</option>
                        <option value="Decline">Decline</option>


                    </select>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
