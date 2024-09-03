<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'Beras 64',
                'jmlbarang' => '5',
                'harga' => '12000',
            ],
            [
                'nama' => 'Beras Bromo',
                'jmlbarang' => '5',
                'harga' => '12000',
            ],
            [
                'nama' => 'Katul ',
                'jmlbarang' => '5',
                'harga' => '8000',
            ],
            [
                'nama' => 'Sekam ',
                'jmlbarang' => '5',
                'harga' => '2000',
            ],
            [
                'nama' => 'Padi ',
                'jmlbarang' => '5',
                'harga' => '2000',
            ]
        ];

        foreach ($data as $d) {
            Barang::create($d);
        }
    }
}