@extends('layout.sidebar')
@section('konten')

    <div class="mb-3">
        <h3>Service Request Status</h3>
        @if ($serviceReq->isEmpty())
            <hr>
            <h4 class="text-center">There is No Request Yet !</h4>
            <hr>
        @else
            <table class="table" border="4">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Req-ID</th>
                    <th scope="col">Client</th>
                    <th scope="col">Project Ref</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                </thead>
                @foreach ($serviceReq as $req)
                    <tbody>
                        <td>{{ ($serviceReq->currentPage() - 1) * $serviceReq->perPage() + $loop->iteration }}</td>
                        <td scope="row">{{ $req->id }}</td>
                        <td scope="row">{{ $req->client->name }}</td>
                        @if ($req->project_ref == 0)
                            <td scope="row">New</td>
                        @else
                            <td scope="row">{{ $req->project_ref }} || {{ $req->project->name }}</td>
                        @endif
                        <td scope="row">{{ $req->description }}</td>
                        <td scope="row">{{ $req->status }}</td>
                        <td class="d-flex justify-content-center">

                            <a href="{{ route('admin.serviceReq.edit', $req->id) }}" class="btn btn-warning mx-1">Edit</a>
                            @if ($req->status == 'In Review')
                                <a href="{{ route('admin.serviceOff.create', $req->id) }}"
                                    class="btn btn-success mx-1">SendOffer</a>
                            @endif
                            <form action="{{ route('admin.serviceReq.delete', $req->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mx-1">Delete</button>
                            </form>
                            {{-- <a href="{{ route('admin.serviceOff.create', ['id' => $req->id, 'client_id' => $req->client_id]) }}"
                                class="btn btn-success mx-1">SendOffer</a> --}}

                        </td>


                    </tbody>
                @endforeach
            </table>
            {{ $serviceReq->links('pagination::bootstrap-5') }}
            <hr>
        @endif
    </div>

    <div class="mb-3">
        <h3>Service Offer </h3>
        @if ($serviceOff->isEmpty())
            <hr>
            <h4 class="text-center">There is No Offer Yet !</h4>
            <hr>
        @else
            <table class="table" border="4">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Service_request_id</th>
                    <th scope="col">Client</th>
                    <th scope="col">Client Request</th>
                    <th scope="col">Offer</th>
                    <th scope="col">Estimated Price</th>
                    <th scope="col">Downpayment ( DP 35% )</th>
                    <th scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                    {{-- <th scope="col"></th> --}}
                </thead>
                @foreach ($serviceOff as $offer)
                    <tbody>
                        <td>{{ ($serviceOff->currentPage() - 1) * $serviceOff->perPage() + $loop->iteration }}</td>
                        <td scope="row">{{ $offer->service_request_id }}</td>
                        <td scope="row">{{ $offer->client->name }}</td>
                        <td scope="row">{{ $offer->client_request }}</td>
                        <td scope="row">{{ $offer->offer }}</td>
                        <td scope="row">{{ $offer->estimated_price }}</td>
                        <td scope="row">{{ $offer->down_payment }}</td>
                        <td scope="row">{{ $offer->status }}</td>
                        <td class="d-flex justify-content-center" scope="row">
                            @if ($offer->status == 'Pending')
                                Waiting For Client Response
                            @elseif ($offer->status == 'Accept')
                                <a href="{{ route('admin.project') }}"
                                    class="btn btn-outline-success btn-sm mx-1">Project</a>
                            @elseif ($offer->status == 'Decline')
                                <form action="{{ route('client.serviceoff.delete', $offer->id) }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm mx-1">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tbody>
                @endforeach
            </table>
            {{ $serviceOff->links('pagination::bootstrap-5') }}
            <hr>
        @endif
    </div>


@endsection
