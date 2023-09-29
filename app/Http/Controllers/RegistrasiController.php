<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi/index', [
            'judul' => 'Registrasi'
        ]);
    }

    public function simpan(Request $request)
    {
        $tervalidasi = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'username' => 'required|unique:users',
        ]);

        $tervalidasi['password'] = Hash::make($tervalidasi['password']);

        User::create($tervalidasi);

        return redirect('/masuk')->with('pesan', 'berhasil daftar');
    }
}
