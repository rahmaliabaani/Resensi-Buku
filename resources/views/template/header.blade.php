<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resensi Buku | {{ $title }}</title>
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
  {{-- icon bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg p-2 fixed-top bg-light shadow">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="Logo" width="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse fs-6 justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Beranda') ? 'active' : '' }}" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Buku') ? 'active' : '' }}" href="/buku">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Informasi') ? 'active' : '' }}" href="/informasi">Informasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Kategori') ? 'active' : '' }}" href="/kategori">Kategori</a>
          </li>
        @auth
          <li class="nav-item dropdown mt-1">
            <a class="nav-link dropdown-toggle px-3 py-2 text-white fs-6 {{ ($title === 'Dashboard') ? 'active' : '' }}" style="background-color: #b90e0e;" href="#" role="button" data-bs-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
            @if (auth()->user()->role == 'pengguna')
              <li><a class="dropdown-item" href="/pengguna">Halaman Utama</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Keluar</button>
                </form>
              </li>
            @elseif (auth()->user()->role == 'admin')
              <li><a class="dropdown-item" href="/admin">Dashbord Kamu</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Keluar</button>
                </form>
              </li>
            @endif
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link fs-6 {{ ($title === 'Masuk') ? 'active' : '' }}" href="/login">Masuk</a>
          </li>
        @endauth
        </ul>
      </div>
    </div>
  </nav>