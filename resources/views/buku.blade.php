@extends('layouts.main')

@section('container')
<div class="container py-5 mt-5">
    <h2 class="text-center">{{ $title }}</h2>


    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('buku') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
                    <button class="btn btn-dark ms-1" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
      @foreach ($buku as $bk)
        <div class="col-md-4 my-2 d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
              <img src="{{ $bk->gambar_url }}" class="card-img-top" alt="..." style="height: 15rem;">
                <div class="card-body">
                  <h4><a href="/buku/{{ $bk->slug }}" class="text-decoration-none">{{ Str::limit(strip_tags($bk->judul), 25, '...') }}</a></h4>
                  <h6><a href="/penulis/" class="text-decoration-none">{{ $bk->user->name }}</a> | <a href="/kategori/" class="text-decoration-none">{{ $bk->kategori->nama }}</a></h6>
                  <p class="text-truncate"> {{ strip_tags($bk->isi) }}</p>
                </div>
            </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-end">
        {{ $buku->links() }}
    </div>
</div>

@endsection