@extends('layout')

@section('title', 'Tambah PTN')

@section('content')
    <h1>Tambah Data PTN</h1>
    <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <input class="form-control" id="nama" placeholder="Nama PTN" name="nama" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" placeholder="Deskripsi mengenai PTN..." rows="6"
                name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Upload Logo (opsional)</label>
            <input type="file" class="form-control-file" id="gambar" placeholder="Logo PTN" name="gambar" accept="image/*">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary float-right" id="submit">
    </form>
@endsection
