<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Transaksi;
use App\Barang;

class LaporanController extends Controller
{
    public function index(Request $request)
    {

        $transaksi = DB::table('transaksi')
        ->join('barang', 'barang.id', '=', 'transaksi.id_barang')
        ->select('transaksi.*','barang.nama_barang');

        // if($request->from && $request->to)
            $transaksi->whereBetween('transaksi.tanggal_transaksi', [$request->from, $request->to]);
            $transaksi->orderBy('tanggal_transaksi','asc');

        $data['from'] = $request->from;
        $data['to'] = $request->to;

        $data['data_transaksi'] = $transaksi->get(); 

        return view('laporan.index',$data);
    }

    public function filter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        return redirect()->route('laporan.index',['from'=>$request->from,'to'=>$request->to]);
    }
}
