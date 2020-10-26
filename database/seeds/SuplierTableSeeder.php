<?php

use Illuminate\Database\Seeder;

class SuplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Suplier::create([
            'nama' => 'Ahmad',
            'alamat' => 'Jl. Anggrek No.08',
            'email' => 'ahmad@gmail.com',
            'no_hp' => '085689785678'
        ]);
        App\Suplier::create([
            'nama' => 'Dimas',
            'alamat' => 'Jl. Melati No.09',
            'email' => 'dimas@gmail.com',
            'no_hp' => '089678998899'
        ]);
        App\Suplier::create([
            'nama' => 'Rara',
            'alamat' => 'Jl. Kenanga No.11',
            'email' => 'rara@gmail.com',
            'no_hp' => '084567896767'
        ]);
    }
}
