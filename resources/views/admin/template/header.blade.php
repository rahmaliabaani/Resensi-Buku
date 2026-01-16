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
            <a class="nav-link {{ ($title === 'Data Resensi') ? 'active' : '' }}" href="/all-resensi">Data Resensi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Data Kategori') ? 'active' : '' }}" href="/all-kategori">Data Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Data Pengguna') ? 'active' : '' }}" href="/all-pengguna">Data Pengguna</a>
          </li>
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="nav-link border-0 bg-light fs-6">Keluar</button>
        </form>
        </ul>
      </div>
    </div>
  </nav>