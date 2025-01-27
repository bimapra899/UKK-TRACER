<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusAlumniSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_status_alumni')->insert([
            [
                'id_status_alumni' => 1,
                'status' => 'Belum Bekerja',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_status_alumni' => 2,
                'status' => 'Bekerja',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_status_alumni' => 3,
                'status' => 'Wirausaha',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_status_alumni' => 4,
                'status' => 'Kuliah',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 