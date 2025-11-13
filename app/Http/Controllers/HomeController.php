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
        if (session('fake_auth') === true) {
            return view('home', [
                'data' => null,
                'carousels' => null,
                'categories' => null,
            ]);
        }
        $galleries = Gallery::with('category')
            ->latest()
            ->take(6)
            ->get();
        $carousel = Carousel::all();
        $category = Category::all();
        return view('home', [
            'data' => $galleries,
            'carousels' => $carousel,
            'categories' => $category
        ]);
    }
}
