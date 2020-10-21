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
        $this->call(UsersTableSeeder::class);
        $this->call(PenulisTableSeeder::class);
        $this->call(PenerbitTableSeeder::class);
        $this->call(JenisbukuTableSeeder::class);
        $this->call(SuplierTableSeeder::class);
        $this->call(BukuTableSeeder::class);
    }
}
