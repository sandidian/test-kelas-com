<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Transaksi;
use App\Barang;

class TransaksiController extends Controller
{
    public function index()
    {
        $data_transaksi = Transaksi::orderBy('tanggal_transaksi','asc')->get();

        $data['data_transaksi'] = $data_transaksi; 

        return view('transaksi.index',$data);
    }

}
