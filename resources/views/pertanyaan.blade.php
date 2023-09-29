@extends('susunan/utama')

@section('container')
  <div class="row">
    <div class="col-md-12">
      <form action="/pertanyaan">
        @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif

        @if (request('pengguna'))
          <input type="hidden" name="pengguna" value="{{ request('pengguna') }}">
        @endif

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Ketikkan kata kunci..." name="cari" value="{{ request('cari') }}">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
      </form>
    </div>
  </div>

  <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
    @foreach ($pertanyaan as $prtnyn)
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{ $prtnyn->id }}" aria-expanded="true" aria-controls="panelsStayOpen-{{ $prtnyn->id }}">
            {{ $prtnyn->tanya }}
          </button>
        </h2>

        <div id="panelsStayOpen-{{ $prtnyn->id }}" class="accordion-collapse collapse">
          <div class="accordion-body">
            <img src="{{ asset('storage') . '/' . $prtnyn->gambar }}" alt="ga ada gambar">

            <p><a href="/pertanyaan?pengguna={{ $prtnyn->user->username }}">{{ $prtnyn->user->name }}</a></p>
            <p><a href="/pertanyaan?kategori={{ $prtnyn->kategori->id }}">{{ $prtnyn->kategori->nama }}</a></p>
            <p>{{ $prtnyn->jawab }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $pertanyaan->links() }}
@endsection