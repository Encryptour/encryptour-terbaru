<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate(['password'=> 'required']);

        $password = $data['password'];
        $pass = env('PASSWORD');

        if ($pass) {
           if (hash_equals($pass, $password)) {
               $request->session()->regenerate();
               $request->session()->put('auth', true);
               return redirect()->intended('/');
           } else {
               return back()->withErrors(['password' => 'The provided password is incorrect.']);
           }
        }
        return back()->withErrors(['password' => 'Authentication is not configured.']);

    }
}
