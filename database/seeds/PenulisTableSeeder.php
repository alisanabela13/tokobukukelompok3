<?php

use Illuminate\Database\Seeder;

class PenulisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Penulis::create([
            'nama_penulis' => 'Risa Saraswati'
        ]);
        App\Penulis::create([
            'nama_penulis' => 'Tere Liye'
        ]);
        App\Penulis::create([
            'nama_penulis' => 'Rahimsyah'
        ]);
        App\Penulis::create([
            'nama_penulis' => 'Lee Dae Han'
        ]);
    }
}
