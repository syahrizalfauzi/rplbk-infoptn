@extends('layout')

@section('title', 'Nama PTNNya di sini')

@section('content')
    <article class="pb-4">
        <a href="{{ url('/') }}" style="color: blue">
            Kembali </a>
        <h1>{{ $ptn->nama }}</h1>
        @if (isset($ptn->gambar))
            <div class="text-center">
                <img src="{{ url('/images/' . $ptn->gambar) }}" alt="{{ $ptn->nama }}"
                    style="height: 256px; width:auto; object-fit:contain" class="my-4" />
            </div>

        @endif
        <p>{{ $ptn->deskripsi }}</p>
    </article>
@endsection
