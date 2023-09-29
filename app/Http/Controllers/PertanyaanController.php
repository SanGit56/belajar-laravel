<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{
    public function index()
    {
        return view('pertanyaan', [
            'judul' => 'Hexa Property | Pertanyaan',
            'pertanyaan' => Pertanyaan::latest()->saring(request(['cari', 'kategori', 'pengguna']))->paginate(3)->withQueryString()
        ]);
    }
}