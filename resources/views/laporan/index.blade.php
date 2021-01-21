@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex flex-column my-4">
            <div class="h6 mt-2">Laporan Transaksi</div>
            <div class="h6 mt-2"><small>Filter</small></div>
            <form class="form-inline" method="POST">
                @csrf()
                <label class="my-1 mr-2" >From </label>
                <input type="date" class="form-control mb-2 mr-sm-2" placeholder="From date" name="from" value="{{ old('from') ? old('from') : $from }}">
                <label class="my-1 mr-2" >To</label>
                <input type="date" class="form-control mb-2 mr-sm-2" placeholder="To date" name="to" value="{{ old('to') ? old('to') : $to }}">
                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-danger mb-2 ml-2">Reset</a>
            </form>
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
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ \Carbon\Carbon::parse($value->tanggal_transaksi)->format('Y-m-d') }}</td>
                        </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Harap filter terlebih dahulu.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection