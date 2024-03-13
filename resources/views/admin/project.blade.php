@extends('layout.sidebar')
@section('konten')
    <div class="mb-3">
        <h1 class="text-bg-secondary text-center">Projects Management</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Service Offer ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($projects as $project)
                    <tr>
                        {{--  $loop->iteration = Menampilakan Number Loop Saat ini sesuai Jumlah Barisnya Starts dari 1 --}}
                        {{-- <td>{{ $loop->index + 1 }}</td> --}}
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}</td>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->client->name }}</td>
                        <td>{{ $project->service_offer_id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('admin.project.edit', $project->id) }}"
                                class="btn btn-outline-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.project.delete', $project->id) }}" method="post" class="d-inline">
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
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
