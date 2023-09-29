<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DasborPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dasbor/pertanyaan/index', [
            'pertanyaan' => Pertanyaan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dasbor/pertanyaan/tambah', [
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tervalidasi = $request->validate([
            'tanya' => 'required',
            'jawab' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);

        if ($request->file('gambar'))
        {
            $tervalidasi['gambar'] = $request->file('gambar')->store('foto');
        }

        $tervalidasi['user_id'] = auth()->user()->id;

        Pertanyaan::create($tervalidasi);

        return redirect('/dasbor/pertanyaan')->with('pesan', 'berhasil nambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        return view('dasbor/pertanyaan/tampil', [
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        return view('/dasbor/pertanyaan/ubah', [
            'pertanyaan' => $pertanyaan,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $tervalidasi = $request->validate([
            'tanya' => 'required',
            'jawab' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);

        if ($request->file('gambar'))
        {
            if ($request->gambarLama)
            {
                Storage::delete($request->gambarLama);
            }

            $tervalidasi['gambar'] = $request->file('gambar')->store('foto');
        }

        $tervalidasi['user_id'] = auth()->user()->id;

        Pertanyaan::where('id', $pertanyaan->id)->update($tervalidasi);

        return redirect('/dasbor/pertanyaan')->with('pesan', 'berhasil ngubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        if ($pertanyaan->gambar)
        {
            Storage::delete($pertanyaan->gambar);
        }

        Pertanyaan::destroy($pertanyaan->id);

        return redirect('/dasbor/pertanyaan')->with('pesan', 'berhasil hapus');
    }
}