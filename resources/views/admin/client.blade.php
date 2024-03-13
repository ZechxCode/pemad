@extends('layout.sidebar')
@section('konten')
    <div class="mb-3">
        <h1 class="text-bg-secondary text-center">Client Management</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($clients as $client)
                    <tr>
                        {{--  $loop->iteration = Menampilakan Number Loop Saat ini sesuai Jumlah Barisnya Starts dari 1 --}}
                        {{-- <td>{{ $loop->index + 1 }}</td> --}}
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ ($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration }}</td>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->user_id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->contact_info }}</td>
                        <td>
                            <a href="{{ route('admin.client.edit', $client->id) }}"
                                class="btn btn-outline-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.client.delete', $client->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex mb-5">
            <a href="{{ route('admin.client.create') }}" class="btn btn-outline-primary ms-auto">Tambah</a>
        </div>
        {{ $clients->links('pagination::bootstrap-5') }}
    </div>
@endsection
