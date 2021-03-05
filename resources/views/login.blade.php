@extends('layout')

@section('title', 'Log in')
@section('navlink', 'Log in')

@section('content')
    <div class="col-sm-12 col-md-8 col-lg-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/login') }}" method="POST" class="container-fluid">
            @csrf
            <h1>Log in</h1>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" id="username" placeholder="Username" name="username" autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                    autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Log in</button>
        </form>
    </div>
    {{-- <div class="row">
        <div class="col-1 col-sm-2 col-md-3 col-lg-4">
        </div>
        <div class="col-10 col-sm-8 col-md-6 col-lg-4 card my-auto">
            One of three columns
        </div>
        <div class="col-1 col-sm-2 col-md-3 col-lg-4">
        </div>
    </div> --}}
@endsection
