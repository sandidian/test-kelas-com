@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between my-4">
            <div class="h6 mt-2">Buat Transaksi</div>
            <a href="{{ route('transaksi.index') }}" class="btn btn-info">Data Transaksi</a>
        </div>

        <form method="POST">
            @csrf()
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="input" class="form-control" readonly value="{{ $data_barang->nama_barang }}">
            </div>
            <div class="form-group">
                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                <input type="date" class="form-control" id="tanggal_transaksi" placeholder="Tanggal Transaksi" name="tanggal_transaksi">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
@endsection