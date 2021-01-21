@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between my-4">
            <div class="h6 mt-2">Data Barang</div>
            <a href="{{ route('barang.create') }}" class="btn btn-info">Tambah Barang</a>
        </div>

        <table class="table mt-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Status</th>
                <th scope="col">Sewa</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data_barang) > 0)
                    @php
                        $no = 1;
                    @endphp
                    @foreach($data_barang as $key => $value)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>
                                @if($value->status == 1)
                                    Tersedia
                                @else
                                    Disewa
                                @endif
                            </td>
                            <td>
                                @if($value->status == 1)
                                    <a href="{{ route('barang.transaksi',$value->id) }}" class="btn btn-danger">Sewa Barang</a>
                                @else
                                    <a href="{{ route('barang.change',$value->id) }}" class="btn btn-success">Ubah Status</a>
                                    
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('barang.update',$value->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('barang.delete',$value->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini? Semua data transaksi dan laporan dengan ID Barang = {{ $value->id }} akan dihapus juga.');">Delete</a>
                            </td>
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