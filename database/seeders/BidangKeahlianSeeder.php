<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidangKeahlian;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangKeahlian::create(['kode_bidang_keahlian' => 'TKR', 'bidang_keahlian' => 'Teknik Kendaraan Ringan']);
        BidangKeahlian::create(['kode_bidang_keahlian' => 'TPM', 'bidang_keahlian' => 'Teknik Mesin']);
        BidangKeahlian::create(['kode_bidang_keahlian' => 'RPL', 'bidang_keahlian' => 'Rekayasa Perangkat Lunak']);
    }
}