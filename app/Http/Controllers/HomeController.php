<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $count = 6;

        $galleries = Gallery::inRandomOrder()->paginate($count);
        return view('home',[
            'data' => $galleries,
        ]);
    }
}
