@extends('layout.template')

@section('konten')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-center mt-3">Login</h1>
    <form action="{{ route('login.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    </form>
@endsection

<div></div>
