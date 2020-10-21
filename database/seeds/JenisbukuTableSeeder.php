<?php

use Illuminate\Database\Seeder;

class JenisbukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Jenisbuku::create([
            'jenis_buku' => 'Novel'
        ]);
        App\Jenisbuku::create([
            'jenis_buku' => 'Komik'
        ]);
        App\Jenisbuku::create([
            'jenis_buku' => 'Buku Ilmu Pengetahuan'
        ]);
    }
}
