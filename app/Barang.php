<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = 'barang';

    public function transaksi()
    {
        return $this->hasMany(\App\Transaksi::class,'id_barang','id');
    }
}
