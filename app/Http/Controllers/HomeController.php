<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $jsonPath = public_path('assets/data.json'); // Jangan lupa pastikan file ada di folder public/asset/
        if (!file_exists($jsonPath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $data = json_decode(file_get_contents($jsonPath), true);

        shuffle($data);
        $randomData = array_slice($data, 0, 12);

        $currentPage = $request->input('page', 1);
        $perPage = 6;
        $currentItems = array_slice($randomData, ($currentPage - 1) * $perPage, $perPage);

        return view('home', [
            'data' => $currentItems,
            'currentPage' => $currentPage,
        ]);
    }
}
