@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between my-4">
            <div class="h6 mt-2">Data Transaksi</div>
            <a href="{{ route('laporan.index') }}" class="btn btn-info">Laporan Transaksi</a>
        </div>

        <table class="table mt-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data_transaksi) > 0)
                    @php
                        $no = 1;
                    @endphp
                    @foreach($data_transaksi as $key => $value)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $value->barang->nama_barang }}</td>
                            <td>{{ \Carbon\Carbon::parse($value->tanggal_transaksi)->format('Y-m-d') }}</td>
                        </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Tidak ada data.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection