@extends('layout')

@section('title', 'Admin Page')
@section('navlink', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <h5>Daftar PTN</h5>
    <form method="GET">
        <div class="form-group input-group">
            <input class="form-control" id="search" placeholder="Search..." name="search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    <div class="d-flex flex-row justify-content-end">
        <a href="{{ url('/create') }}" class="btn btn-primary mb-2">Tambah Data</a>
    </div>

    <div class="d-flex flex-row align-items-center justify-content-between">
        <p class="searchtext mb-4">
            @if (isset($request->search))
                Hasil pencarian '{{ $request->search }}'
            @endif
        </p>
        <div class="flex-fill">
            {{ $ptns->links() }}
        </div>
    </div>
    <div class="col-auto">
        <table class="table table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">File Gambar</th>
                    <th scope="col" colspan="2" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ptns as $ptn)
                    <tr onclick='window.location="{{ url("/$ptn->id") }}";' class="clickable">
                        <th scope="row">{{ $ptn->id }}</th>
                        <td>{{ $ptn->nama }}</td>
                        <td>{{ Illuminate\Support\Str::limit($ptn->deskripsi, 50) }}</td>
                        <td>{{ $ptn->gambar ?? '-' }}</td>
                        <td>
                            <a href="{{ url("edit/$ptn->id") }}" class="btn btn-info mr-2">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url("/$ptn->id") }}" method="post" class="form-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="float-right">
        {{ $ptns->links() }}
    </div>
@endsection
