<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        $order = $request->input('order', 'asc');
        $perPage = 15;

        $query = mahasiswa::query();


        if (!empty($searchQuery)) {
            $query->where('nama_lengkap', 'like', '%' . $searchQuery . '%');
        }

        
        if (in_array($order, ['asc', 'desc'])) {
            $query->orderBy('mdpl', $order);
        }

     
        $data = $query->paginate($perPage)->withQueryString();

        return view('biodata', [
            'data' => $data, // Sudah berupa LengthAwarePaginator
            'searchQuery' => $searchQuery,
            'order' => $order,
            'currentPage' => $data->currentPage(),
            'totalPages' => $data->lastPage(),
        ]);
    }
}
