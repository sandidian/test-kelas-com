<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Transaksi;
use App\Barang;


class BarangController extends Controller
{
    public function index()
    {
        $data_barang = Barang::all();

        $data['data_barang'] = $data_barang; 

        return view('barang.index',$data);
    }

    public function transaksi(Request $request, $id)
    {
        $data_barang = Barang::where(['id'=> $id])->first();

        $data['data_barang'] = $data_barang; 

        return view('barang.transaksi',$data);
    }

    public function transaksiPost(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'tanggal_transaksi' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $model = new Transaksi;

        $model->id_barang = $id;
        $model->tanggal_transaksi = $request->tanggal_transaksi;

        if($model->save()){
            $model->barang->status = 2;
            $model->barang->save();

            return redirect()->route('barang.index')->with('success','Sewa barang berhasil!');
        }
    }
    
    public function change(Request $request,$id)
    {
        $model = Barang::where(['id'=> $id])->first();

        if(!$model){
            return back()->with('error','Barang tidak ditemukan');
        }

        $model->status = 1;

        if($model->save()){
            return redirect()->route('barang.index')->with('success','Status barang berhasil diubah!');
        }
    }

    public function create(Request $request)
    {
        return view('barang.create');
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }   

        $model = new Barang;

        $model->nama_barang = $request->nama_barang;

        if($model->save()){
            return redirect()->route('barang.index')->with('success','Tambah barang berhasil!');
        }
    }

    public function update(Request $request, $id)
    {
        $data_barang = Barang::where(['id'=> $id])->first();

        $data['data_barang'] = $data_barang; 

        return view('barang.update',$data);
    }

    public function updatePost(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }   

        $model = Barang::where(['id'=> $id])->first();

        $model->nama_barang = $request->nama_barang;

        if($model->save()){
            return redirect()->route('barang.index')->with('success','Update barang berhasil!');
        }
    }

    public function delete(Request $request,$id)
    {
        $model = Barang::where(['id'=> $id])->first();

        if(!$model){
            return back()->with('error','Barang tidak ditemukan');
        }

        $model->nama_barang = $request->nama_barang;
        
        foreach($model->transaksi as $data){
            $data->delete();
        }

        if($model->delete()){
            return redirect()->route('barang.index')->with('success','Barang berhasil dihapus!');
        }
    }

}
