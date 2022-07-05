<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::truncate();
        Barang::create(
            [
                'namabarang' => 'Las Besi',
                'hargabarang' => '100000',
                'jumlahbarang' => '5',
            ]
        );
        Barang::create(
            [
                'namabarang' => 'Kunci Inggris',
                'hargabarang' => '25000',
                'jumlahbarang' => '50',
            ]
        );
        Barang::create(
            [
                'namabarang' => 'Ginset',
                'hargabarang' => '500000',
                'jumlahbarang' => '5',
            ]
        );
    }
}
