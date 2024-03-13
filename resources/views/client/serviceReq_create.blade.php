@extends('layout.template')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Service Request</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('client.serviceReq.store') }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">Client Name</label>
                    <input type="text" class="form-control" value="{{ $client->name }}" disabled>
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                </div>

                <div class="mb-3">
                    <label>Project ref</label>
                    <select class="form-select" name="project_ref" required>
                        <option value="">Select</option>
                        @if ($project->isNotEmpty())
                            @foreach ($project as $pro)
                                <option value="{{ $pro->id }}">
                                    {{ $pro->id }} || {{ $pro->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">
                                New
                            </option>
                        @endif
                    </select>
                </div>




                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
