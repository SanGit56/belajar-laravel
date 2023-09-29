@extends('susunan/utama')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-4">
      @if (session()->has('pesan'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session('pesan') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      <main class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal">Masuk</h1>

        <form action="/masuk" method="POST">
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
            <input type="text" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
            <label for="password">Kata sandi</label>
          </div>
        
          <div class="form-check text-start my-3">
              <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                  Ingat saya
              </label>
          </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Masuk</button>
        </form>

        <small class="d-block text-center mt-2"><a href="/registrasi">Daftar</a></small>

        <p class="mt-3 mb-3 text-body-secondary">&copy; 2017–2023</p>
      </main>
    </div>
  </div>
@endsection