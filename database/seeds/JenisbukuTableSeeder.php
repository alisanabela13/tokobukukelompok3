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
            'name' => 'Novel'
        ]);
        App\Jenisbuku::create([
            'name' => 'Komik'
        ]);
        App\Jenisbuku::create([
            'name' => 'Buku Ilmu Pengetahuan'
        ]);
    }
}
