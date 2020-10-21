<?php

use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Buku::create([
            'file' => 'default.jpg',
            'isbn' => '9786022202417',
            'judul_buku' => 'Janshen',
            'penulis_id' => 1,
            'penerbit_id' => 2,
            'jenisbuku_id' => 3,
            'suplier_id' => 1,
            'tahun_terbit' => 2015,
            'harga_beli' => 80000,
            'harga_jual' => 100000,
            'rak_buku' => 'A1',
            'jumlah_stok' => '80'
        ]);
        App\Buku::create([
            'file' => 'default.jpg',
            'isbn' => '979103504504',
            'judul_buku' => 'RPUL',
            'penulis_id' => 2,
            'penerbit_id' => 1,
            'jenisbuku_id' => 3,
            'suplier_id' => 3,
            'tahun_terbit' => 2017,
            'harga_beli' => 85000,
            'harga_jual' => 105000,
            'rak_buku' => 'B3',
            'jumlah_stok' => '76'
        ]);
    }
}
