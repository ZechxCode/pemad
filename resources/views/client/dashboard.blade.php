@extends('layout.template')
@section('konten')
    <div class="container">
        <div class="text-center">
            <h4>Selamat Datang Di ABCCorps IT Company Terpercaya <br> Silahkan Ajukan Project Sesuai Kebutuhan Mu</h4>
            <a class="btn btn-success mt-3 position-relative" href="{{ route('client.serviceReq.create') }}">Request
                Project</a>
        </div>

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
                        <th scope="col">Edit</th>
                    </thead>
                    @foreach ($serviceReq as $req)
                        <tbody>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td scope="row">{{ $req->id }}</td>
                            <td scope="row">{{ $req->client->name }}</td>
                            @if ($req->project_ref == 0)
                                <td scope="row">New</td>
                            @else
                                <td scope="row">{{ $req->project_ref }} || {{ $req->project->name }}</td>
                            @endif
                            <td scope="row">{{ $req->description }}</td>
                            <td scope="row">{{ $req->status }}</td>
                            @if ($req->status != 'pending')
                                <td scope="row"><small>tidak bisa edit disaat status tidak pending</small></td>
                            @else
                                <td><a href="{{ route('client.serviceReq.edit', $req->id) }}"
                                        class="btn btn-warning">Edit</a>
                            @endif
                            </td>
                        </tbody>
                    @endforeach
                </table>
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
                        <th scope="col">service_request_id</th>
                        <th scope="col">Description</th>
                        <th scope="col">Estimated Price</th>
                        <th scope="col">Downpayment ( DP )</th>
                        <th scope="col">Status</th>
                        <th class="text-center" scope="col">Action</th>
                        {{-- <th scope="col"></th> --}}
                    </thead>
                    @foreach ($serviceOff as $offer)
                        <tbody>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td scope="row">{{ $offer->service_request_id }}</td>
                            <td scope="row">{{ $offer->description }}</td>
                            <td scope="row">{{ $offer->estimated_price }}</td>
                            <td scope="row">{{ $offer->down_payment }}</td>
                            <td scope="row">{{ $offer->status }}</td>
                            <td class="text-center justify-between" scope="row">
                                @if ($offer->status == 'Pending')
                                    <form action="{{ route('client.serviceoff.update', $offer->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="status" value="Accept">
                                        <button class="btn btn-success">Accept</button>
                                    </form>
                                    <form action="{{ route('client.serviceoff.update', $offer->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="status" value="Decline">
                                        <button class="btn btn-danger">Decline</button>
                                    </form>
                                @elseif ($offer->status == 'Accept')
                                    <a href="{{ route('client.project') }}"
                                        class="btn btn-outline-danger btn-sm">Project</a>
                                @elseif ($offer->status == 'Decline')
                                    <form action="{{ route('client.serviceoff.delete', $offer->id) }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>




    </div>
@endsection
