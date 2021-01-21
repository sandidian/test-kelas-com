@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between my-4">
            <div class="h6 mt-2">Tambah Barang</div>
            <a href="{{ route('barang.index') }}" class="btn btn-info">Data Barang</a>
        </div>

        <form method="POST">
            @csrf()
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="input" class="form-control" name="nama_barang">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
@endsection