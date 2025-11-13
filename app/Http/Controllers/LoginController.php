<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate(['password' => 'required']);

        $password = $data['password'];
        $pass = env('PASSWORD');
        $fake = env('FAKE_PASSWORD');

        if ($pass && $fake) {
            if (hash_equals($pass, $password)) {
                $request->session()->regenerate();
                $request->session()->put('auth', true);
                $request->session()->forget('fake_auth');
                return redirect()->intended('/');
            } else if (hash_equals($fake, $password)) {
                $request->session()->regenerate();
                $request->session()->put('fake_auth', true);
                $request->session()->forget('auth');
                return redirect()->intended('/');
            } else {
                return back()->withErrors(['password' => 'The provided password is incorrect.']);
            }
        }
        return back()->withErrors(['password' => 'Authentication is not configured.']);

    }
}
