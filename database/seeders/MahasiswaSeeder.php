<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/mahasiswa.json'));
        $data = json_decode($json, true);
    
        foreach ($data as $item) {
            Mahasiswa::create($item);
        }
    }
}
