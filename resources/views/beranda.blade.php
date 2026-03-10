@extends('layouts.main')

@section('container')
  <section id="beranda" class="beranda pt-5">
    <div class="px-4 pt-5 my-5 text-center">
      <h1 class="display-4 fw-bold text-body-emphasis">Halo Sobat Saget!</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Selamat datang di website kami. Saget merupakan website resensi buku yang akan memberikan rekomendasi buku yang sobat inginkan.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
          <button type="button" class="btn btn-danger px-4 me-sm-3">Selengkapnya..</button>
        </div>
      </div>
      <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
          <img src="/img/buku.jpg" class="img-fluid shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container pt-3 pb-5">
      <div class="my-3">
        <h2 class="text-center">Rekomendasi</h2>
      </div>
      <div class="row">
        @foreach ($buku as $bk)
        <div class="col-md-4 my-2 d-flex justify-content-center">
          <div class="card" style="width: 25rem;">
            <img src="{{ $bk->gambar_url }}" class="card-img-top" alt="..." style="height: 15rem;">
            <div class="card-body">
              <h4><a href="/buku/{{ $bk->slug }}" class="text-decoration-none">{{ Str::limit(strip_tags($bk->judul), 25, '...') }}</a></h4>
              <h6><a href="/penulis/" class="text-decoration-none">{{ $bk->user->name }}</a> | <a href="/kategori/" class="text-decoration-none">{{ $bk->kategori->nama }}</a></h6>
              <p class="text-truncate">{{ $bk->isi }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section style="background-image: url('../img/buku.jpg'); background-position: center; background-size: cover; width: 100%;">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-12 d-flex justify-content-center">
          <h3 class="text-center text-white">“Terlalu banyak dari kita yang tidak mewujudkan impian kita karena kita menjalani ketakutan kita.” <br> – Les Brown -</h3>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container pt-5 pb-5">
      <div class="row">

        <div class="col-lg-4 col-md-4 mx-auto mb-md-0">
          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto shadow" style="width: 150px; height: 150px;">
            <img src="/img/logo.png" height="70" alt=""
            loading="lazy" />
          </div>

          <p class="text-center">Saget merupakan website kumpulan resensi dari berbagai macam buku</p>

          <ul class="list-unstyled d-flex flex-row justify-content-center">
            <li>
              <a class="text-dark px-2" href="#!">
                <i class="bi bi-facebook"></i>
              </a>
            </li>
            <li>
              <a class="text-dark px-2" href="#!">
                <i class="bi bi-instagram"></i>
              </a>
            </li>
            <li>
              <a class="text-dark px-2" href="#!">
                <i class="bi bi-youtube"></i>
              </a>
            </li>
          </ul>
        </div>

        <div class="col-md-8 mx-auto col-lg-5">
          <form class="p-5 p-md-4 border rounded-3 bg-body-tertiary">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email Anda</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
              <label for="floatingTextarea">Pesan</label>
            </div>
            <button class="w-100 btn btn-primary" type="submit">Kirim</button>
            <hr class="my-3">
            <small class="text-body-secondary">Terimakasih atas masukannya.</small>
          </form>
        </div>

      </div>
    </div>
  </section>
@endsection