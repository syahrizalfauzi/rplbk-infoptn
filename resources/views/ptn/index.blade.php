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
    @if (isset($request->search))
        <p class="mb-4">Hasil pencarian '{{ $request->search }}'</p>
    @endif
    @foreach ($ptns as $ptn)
        <a href="{{ url("/$ptn->id") }}" class="card d-flex flex-sm-column flex-md-row mb-4 align-items-center zoom">

            @if (isset($ptn->gambar))
                <div class="p-4">
                    <img src="{{ url('/images/' . $ptn->gambar) }}" alt="{{ $ptn->nama }}"
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
