<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function index()
    {
        return view('masuk/index', [
            'judul' => 'Masuk'
        ]);
    }

    public function autentikasi(Request $request)
    {
        $kredensial = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();

            return redirect()->intended('/dasbor');
        }

        return back()->with('pesan', 'laskdjflskajerroriofjslkdjflksjdflksj');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}