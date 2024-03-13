@extends('layout.sidebar')
@section('konten')
    {{-- @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif --}}

    {{-- 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="mt-5">
        <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data" class="tooltip-end-bottom"
            novalidate>
            @csrf
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="user"></i>
                <input class="form-control" placeholder="Name" name="name" />
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="email"></i>
                <input class="form-control" placeholder="Email" name="email" />
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-off"></i>
                <input class="form-control" name="password" type="password" placeholder="Password" />
            </div>
            <button type="submit" class="btn btn-lg btn-success">Save</button>
        </form>
    </div>
@endsection
