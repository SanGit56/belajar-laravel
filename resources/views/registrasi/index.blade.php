@extends('susunan/utama')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <main class="form-registration w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal">Daftar</h1>

        <form action="/registrasi" method="POST">
            @csrf

            <div class="form-floating">
              <input type="text" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
              <label for="email">Surel</label>

              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror  
            </div>
            
            <div class="form-floating">
              <input type="text" name="password" class="form-control" id="password" placeholder="Password">
              <label for="password">Kata sandi</label>
            </div>

            <div class="form-floating">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nama anda">
              <label for="name">Nama</label>
            </div>
            
            <div class="form-floating">
                <input type="text" name="username" class="form-control rounded-bottom" id="username" placeholder="Nama pengguna">
                <label for="username">Nama pengguna</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Daftar</button>
        </form>

        <small class="d-block text-center mt-2"><a href="/masuk">Masuk</a></small>

        <p class="mt-3 mb-3 text-body-secondary">&copy; 2017–2023</p>
      </main>
    </div>
  </div>
@endsection