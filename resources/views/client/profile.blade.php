@extends('layout.template')
@section('konten')
    <h2>Profile</h2>
    {{-- <a href="{{ url('add-book') }}" class="btn btn-success">Tambah Data Buku</a>
    <a href="{{ url('logout') }}" class="btn btn-warning">Logout</a> --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact Info</th>
                <th scope="col">Edit</th>
                {{-- <th scope="col">Delete</th> --}}
            </tr>
        </thead>
        <tbody>
            {{-- <b>Hallo Selamat Datang {{ $user->name }}</b> --}}
            <h3><b>Hallo Selamat Datang {{ auth()->user()->name }}</b></h3>
            @foreach ($clients as $client)
                <tr>
                    <td scope="row">{{ $client->name }}</td>
                    <td scope="row">{{ $client->contact_info }}</td>
                    {{-- <td><a href="{{ url('/edit/' . $client->id . '/client') }}" class="btn btn-warning">Edit</a></td> --}}
                    <td><a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning">Edit</a></td>
                    {{-- <td><a href="{{ url('/delete/' . $client->id . '/client') }}" class="btn btn-danger">Delete</a></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
