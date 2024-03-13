@extends('layout.sidebar')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold custcoltext">Service Offer</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.serviceOff.store') }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="">Service Request ID</label>
                    <input type="text" class="form-control" value="{{ $serviceReq->id }}" disabled>
                    <input type="hidden" name="service_request_id" class="form-control" value="{{ $serviceReq->id }}">
                </div>

                <div class="mb-3">
                    <label for="">Client ID</label>
                    <input type="text" class="form-control"
                        value="{{ $serviceReq->client_id }} || {{ $serviceReq->client->name }}" disabled>
                    <input type="hidden" name="client_id" class="form-control" value="{{ $serviceReq->client_id }}">
                </div>

                <div class="mb-3">
                    <label for="">Client Request</label>
                    <textarea class="form-control" disabled>{{ $serviceReq->description }}</textarea>
                    <textarea hidden name="client_request" class="form-control">{{ $serviceReq->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Offer</label>
                    <textarea name="offer" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Price</label>
                    <input type="text" name="estimated_price" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">DownPayment (%)</label>
                    <input type="text" name="down_payment" class="form-control" value="35" readonly>
                </div>


                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
