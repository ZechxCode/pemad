@extends('layout.sidebar')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Client Edit</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.client.update', $client->id) }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                </div>
                <div class="mb-3">
                    <label for="">Contact Info</label>
                    <input type="text" name="contact_info" class="form-control" value="{{ $client->contact_info }}">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
