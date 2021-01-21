<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $table = 'transaksi';

    public function barang()
    {
        return $this->hasOne(\App\Barang::class,'id','id_barang');
    }
}
