<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            ['nama_barang' => 'Tas Keril Osprey'],
            ['nama_barang' => 'Tenda Nature Hike 4-5'],
            ['nama_barang' => 'Sepatu Gunung Eiger'],
            ['nama_barang' => 'Meja Lipat Consina']
        ]);

        DB::table('transaksi')->insert([
            ['id_barang' => 1,'tanggal_transaksi'=>'2021-01-01'],
            ['id_barang' => 2,'tanggal_transaksi'=>'2021-01-01'],
            ['id_barang' => 3,'tanggal_transaksi'=>'2021-01-01'],
            ['id_barang' => 3,'tanggal_transaksi'=>'2021-01-02'],
            ['id_barang' => 2,'tanggal_transaksi'=>'2021-01-02'],
            ['id_barang' => 3,'tanggal_transaksi'=>'2021-01-03'],
            ['id_barang' => 1,'tanggal_transaksi'=>'2021-01-03'],
            ['id_barang' => 2,'tanggal_transaksi'=>'2021-01-03'],
        ]);

    }
}
