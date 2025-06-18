<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\gallery;
use App\Models\carousel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $galleries = Gallery::with('category')->paginate(6);
        $carousel = Carousel::all();
        $category = Category::all();
        return view('home',[
            'data' => $galleries,
            'carousels' => $carousel,
            'categories'=> $category
        ]);


    }
}
