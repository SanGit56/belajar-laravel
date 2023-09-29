@extends('dasbor/susunan/utama')

@section('container')
<div class="col-lg-8 mt-4">
  <img src="{{ asset('storage') . '/' . $pertanyaan->gambar }}" alt="ga ada gambar">

  <div class="bg-warning">
    <p>{{ $pertanyaan->tanya }}</p>
    <p>{{ $pertanyaan->jawab }}</p>

    <hr>
    
    <a href="/dasbor/pertanyaan">kembali</a>
    <a href="/dasbor/pertanyaan/{{ $pertanyaan->id }}/edit">sunting</a>
    
    <form action="/dasbor/pertanyaan/{{ $pertanyaan->id }}" method="POST" class="d-inline">
      @method('delete')
      @csrf

      <button class="badge bg-danger" onclick="return confirm('yakin?')">hapus</button>
    </form>
  </div>
</div>
@endsection