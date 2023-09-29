<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="/">Hexa Property</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($judul === 'Hexa Property | Toko') ? 'active' : '' }}" href="/toko">Toko</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($judul === 'Hexa Property | Pertanyaan') ? 'active' : '' }}" href="/pertanyaan">Pertanyaan</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($judul === 'Hexa Property | Tentang') ? 'active' : '' }}" href="/tentang">Tentang</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pengguna
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Keranjang</a></li>
            <li><a class="dropdown-item" href="#">Pesanan</a></li>
            <li><a class="dropdown-item" href="#">Riwayat Pemesanan</a></li>
          </ul>
        </li>
      </ul>

      <ul class="navbar nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" style="color:white;" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dasbor">Dasbor</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/keluar" method="POST">
                  @csrf
                  
                  <button type="submit" class="dropdown-item">Keluar</button>
                </form>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a href="/masuk" class="nav-link text-decoration-none" style="color:white;">Masuk</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>