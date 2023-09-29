@extends('dasbor/susunan/utama')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button>
    </div>
  </div>

  <div class="table-responsive small">
    @if (session()->has('pesan'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('pesan') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <a href="/dasbor/kategori/create">tambah</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($kategori as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama }}</td>
          <td>
            <a href="/dasbor/kategori/{{ $k->id }}">lihat</a>
            <a href="/dasbor/kategori/{{ $k->id }}/edit">sunting</a>

            <form action="/dasbor/kategori/{{ $k->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf

              <button class="badge bg-danger" onclick="return confirm('yakin?')">hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection