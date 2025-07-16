<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Amil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('panel/dashboard');
        }

        return back()->with('loginError', 'Gagal! Kombinasi username dan kata sandi tidak sesuai. Silahkan coba lagi.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
