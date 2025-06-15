<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/gallery.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            Gallery::create($item);
        }
    }
}
