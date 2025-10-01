<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        $order = $request->input('order', 'asc');
        $query = mahasiswa::query();


        if (!empty($searchQuery)) {
            if ($searchQuery == 'sokinpadim') {

                $today = Carbon::today();

                $upcomingBirthdays = Mahasiswa::all()->map(function ($mhs) use ($today) {
                    $ttl = $mhs->ttl;
                    $parts = explode(',', $ttl);
                    $tanggal = trim($parts[1] ?? '');

                    try {
                        $birthDate = Carbon::createFromFormat('d F Y', $tanggal)
                            ->setYear($today->year)
                            ->startOfDay();

                        if ($birthDate->isBefore($today)) {
                            $birthDate->addYear();
                        }

                        $daysLeft = $today->diffInDays($birthDate);

                        return [
                            'nim' => $mhs->nim,
                            'nama' => $mhs->nama_lengkap,
                            'ttl' => $mhs->ttl,
                            'days_left' => $daysLeft,
                        ];
                    } catch (\Exception $e) {
                        return null;
                    }
                })
                    ->filter() // buang null
                    ->filter(fn($item) => $item['days_left'] <= 30)
                    ->sortBy('days_left')
                    ->values();

                return view('secret', [
                    'upcoming' => $upcomingBirthdays
                ]);

            }
            $query->where('nama_lengkap', 'like', '%' . $searchQuery . '%');
        }


        if (in_array($order, ['asc', 'desc'])) {
            $query->orderBy('mdpl', $order);
        }


        $data = $query->select('nim',
        'email_adress',
        'nama_lengkap',
        'nama_panggilan',
        'agama',
        'asal',
        'ttl',
        'alamat_rumah',
        'alamat_kos',
        'hobi',
        'quotes',
        'tempat_makan_fav',
        'no_wa',
        'user_ig',
        'formal_picture',
        'non_formal_picture',
        'formal_picture_del',
        'non_formal_picture_del',
        'mdpl')->get();

        return view('biodata', [
            'data' => $data,
            'searchQuery' => $searchQuery,
            'order' => $order,
        ]);
    }
}
