<?php

use Illuminate\Database\Seeder;

class PenerbitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Penerbit::create([
            'nama_penerbit' => 'UPP STIM YKPN'
        ]);
        App\Penerbit::create([
            'nama_penerbit' => 'PT. Bukune Kreatif Cipta'
        ]);
        App\Penerbit::create([
            'nama_penerbit' => 'GagasMedia'
        ]);
        App\Penerbit::create([
            'nama_penerbit' => 'CV. ITA Surakarta'
        ]);
    }
}
