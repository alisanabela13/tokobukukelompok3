<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'posisi' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123')
        ]);
        App\User::create([
            'name' => 'operator',
            'username' => 'operator',
            'posisi' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('123123')
        ]);
        App\User::create([
            'name' => 'kasir',
            'username' => 'kasir',
            'posisi' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('123123')
        ]);
    }
}
