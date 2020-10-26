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
            'judul' => 'Janshen',
            'id_penulis' => 1,
            'id_penerbit' => 2,
            'id_jenisbuku' => 3,
            'id_suplier' => 1,
            'tahun_terbit' => 2015,
            'harga_beli' => 80000,
            'harga_jual' => 100000,
            'lokasi' => 'A1',
            'jumlah' => '80'
        ]);
        App\Buku::create([
            'file' => 'default.jpg',
            'isbn' => '979103504504',
            'judul' => 'RPUL',
            'id_penulis' => 2,
            'id_penerbit' => 1,
            'id_jenisbuku' => 3,
            'id_suplier' => 3,
            'tahun_terbit' => 2017,
            'harga_beli' => 85000,
            'harga_jual' => 105000,
            'lokasi' => 'B3',
            'jumlah' => '76'
        ]);
    }
}
