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
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750132028_6mtadiTKI.jpg',
            'img_del' => '6850e53eb13a102537fa702a'
        ]);
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750132090_d5UTZEZaW.jpg',
            'img_del' => '6850e57bb13a102537fc073a'
        ]);
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750132102_RD76ipxYu.jpg',
            'img_del' => '6850e588b13a102537fc41e5'
        ]);
        Carousel::create([
            'img' => 'https://ik.imagekit.io/encryptour/carousel/compressed_1750132114_s0DEw-ndV.jpg',
            'img_del' => '6850e594b13a102537fc8ee3'
        ]);
    }
}
