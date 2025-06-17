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
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750131107_Usiu4xUuT.jpg',
            'img_del' => '6850e1a4b13a102537e32521'
        ]);
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750131219_yMCnAaw53.jpg',
            'img_del' => '6850e215b13a102537e5bfc3'
        ]);
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750131235_snZP7_xF_.jpg',
            'img_del' => '6850e225b13a102537e621df'
        ]);
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750131248_-BiqIfZ97.jpg',
            'img_del' => '6850e232b13a102537e67d60'
        ]);
    }
}
