@extends('layout')

@section('title', 'Edit PTN')

@section('content')
    <h1>Edit Data PTN</h1>
    <form action='{{ url("/$ptn->id") }}' method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ ucfirst(trans($error)) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="nama">Nama PTN</label>
            <input class="form-control" id="nama" placeholder="Nama PTN" name="nama"
                value="{{ old('nama') ?? $ptn->nama }}">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" placeholder="Deskripsi mengenai PTN..." name="deskripsi"
                rows="6">{{ old('deskripsi') ?? $ptn->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Upload Logo (opsional)</label>
            <input type="file" class="form-control-file" id="gambar" placeholder="Logo PTN" name="gambar" accept="image/*"
                value={{ $ptn->gambar }}>
        </div>
        @if (isset($ptn->gambar))
            <div class="p-4">
                <img src='{{ url("/storage/images/$ptn->id.$ptn->gambar") }}' alt="{{ $ptn->nama }}"
                    style="height: 128px; width:auto; object-fit:contain" />
            </div>
        @endif
        <input type="submit" value="Submit" class="btn btn-primary float-right" id="submit">
    </form>
@endsection
