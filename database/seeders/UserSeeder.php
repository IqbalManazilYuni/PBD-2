<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Iqbal',
            'role' => 'pegawai',
            'email' => 'manazil@gmail.com',
            'password' => bcrypt('pegawai'),
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Iqbal',
            'role' => 'admin',
            'email' => 'manazilyuni@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);
    }
}
