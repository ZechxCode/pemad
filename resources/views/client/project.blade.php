@extends('layout.template')
@section('konten')


    <div class="mb-3">
        <h3>Project Status</h3>
        @if ($project->isEmpty())
            <hr>
            <h4 class="text-center">There is No Project Yet !</h4>
            <hr>
        @else
            <table class="table" border="4">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Client ID</th>
                    <th scope="col">Service Offer ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                @foreach ($project as $pro)
                    <tbody>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td scope="row">{{ $pro->id }}</td>
                        <td scope="row">{{ $pro->client_id }}</td>
                        <td scope="row">{{ $pro->service_offer_id }}</td>
                        <td scope="row">{{ $pro->name }}</td>
                        <td scope="row">{{ $pro->description }}</td>
                        <td scope="row">{{ $pro->status }}</td>
                        @if ($pro->status == 'Waiting For Payment ( DP )')
                            <td><a href="{{ route('client.project.invoice.create', $pro->id) }}"
                                    class="btn btn-warning">Payment</a>
                            @elseif ($pro->status == 'Done')
                            <td>Terimakasih</td>
                        @else
                            <td>Check Your Payment</td>
                        @endif
                        </td>
                    </tbody>
                @endforeach
            </table>
        @endif
    </div>
@endsection
