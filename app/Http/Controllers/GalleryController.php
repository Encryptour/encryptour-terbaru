<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\category;
use App\Http\Requests\StoregalleryRequest;
use App\Http\Requests\UpdategalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('fake_auth') === true) {
            return view('gallery', [
                'data' => null,
                'categories' => null,
            ]);
        }
        $categories = category::all();
        $gallery = Gallery::with('category')->latest()->get();
        return view("gallery", [
            'data' => $gallery,
            'categories'=> $categories
        ]);
    }
}
