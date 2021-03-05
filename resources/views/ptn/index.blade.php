@extends('layout')

@section('title', 'Info PTN')
@section('navlink', 'Home')

@section('content')
    <h1>Daftar PTN</h1>
    <form method="GET" class="mb-4">
        <div class="form-group input-group">
            <input class="form-control" id="search" placeholder="Search..." name="search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
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
    @foreach ($ptns as $ptn)
        <a href="{{ url("/$ptn->id") }}" class="card d-flex flex-sm-column flex-md-row mb-4 align-items-center zoom">

            @if (isset($ptn->gambar))
                <div class="p-4">
                    <img src="{{ Storage::url($ptn->gambar) }}" alt="{{ $ptn->nama }}"
                        style="height: 128px; width:auto; object-fit:contain" />
                </div>
            @endif
            <div class="card-body flex-grow-1">
                <h1>
                    {{ $ptn->nama }}
                </h1>
                <p>{{ Illuminate\Support\Str::limit($ptn->deskripsi, 300) }}</p>
            </div>
        </a>
    @endforeach

    <div class="float-right">
        {{ $ptns->links() }}
    </div>
@endsection
