<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class Session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jika tidak ada session sama sekali -> redirect ke login
        if (!session()->has('auth') && !session()->has('fake_auth')) {
            return redirect()->route('login');
        }

        // kalau ini fake session -> share variabel ke semua view
        if (session()->has('fake_auth') && session('fake_auth') === true) {
            // Buat variabel global untuk Blade
            View::share('is_fake', true);

            // juga bisa share data lain, misal fake_user_id, fake_role, dsb
            // View::share('fake_role', session('fake_role', 'Mahasiswa'));
        } else {
            // pastikan default false kalau bukan fake
            View::share('is_fake', false);
        }

        // tetap lanjutkan request sehingga semua route tetap bisa diakses
        return $next($request);
    }
}
