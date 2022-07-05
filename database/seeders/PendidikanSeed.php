<?php

namespace Database\Seeders;

use App\Models\Pendidikans;
use Illuminate\Database\Seeder;

class PendidikanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendidikans::truncate();
        Pendidikans::create([
            'pendidikan' => 'SD',
        ]);
        Pendidikans::create([
            'pendidikan' => 'SMP',
        ]);
        Pendidikans::create([
            'pendidikan' => 'SMA',
        ]);
        Pendidikans::create([
            'pendidikan' => 'D-1',
        ]);
        Pendidikans::create([
            'pendidikan' => 'D-3',
        ]);
        Pendidikans::create([
            'pendidikan' => 'S-1',
        ]);

    }
}
