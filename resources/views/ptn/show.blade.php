@extends('layout')

@section('title', 'Nama PTNNya di sini')

@section('content')
    <article class="pb-4">
        @auth
            <a href="{{ url('/admin') }}" style="color: blue">
                Kembali </a>
        @endauth
        @guest
            <a href="{{ url('/') }}" style="color: blue">
                Kembali </a>
        @endguest
        <h1>{{ $ptn->nama }}</h1>
        @if (isset($ptn->gambar))
            <div class="text-center">
                <img src='{{ url("/storage/images/$ptn->id.$ptn->gambar") }}' alt="{{ $ptn->nama }}"
                    style="height: 256px; width:auto; object-fit:contain" class="my-4" />
            </div>

        @endif
        <p>{{ $ptn->deskripsi }}</p>
    </article>
@endsection
