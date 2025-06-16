<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::create(['img' => 'foto-angkatan(1).JPG']);
        Carousel::create(['img' => 'foto-angkatan(2).JPG']);
        Carousel::create(['img' => 'foto-angkatan(3).JPG']);
        Carousel::create(['img' => 'foto-angkatan(4).JPG']);
    }
}
