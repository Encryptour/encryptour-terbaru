<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Carousel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $count = 6;

        $galleries = Gallery::with('category')->inRandomOrder()->paginate($count);
        $carousel = Carousel::all();
        $category = Category::all();
        return view('home',[
            'data' => $galleries,
            'carousels' => $carousel,
            'categories'=> $category
        ]);


    }
}
