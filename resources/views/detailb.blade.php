@extends('layouts.main')

@section('container')
    <div class="container py-5 mt-5">
        <div class="row pt-3">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ $buku->gambar_url }}" class="card-img-top" alt="..." style="max-height: 300px;">
            </div>
            <div class="col-md-8 mt-3">
                <h2>{{ $buku->judul }}</h2>
                <h6>Dari. <a href="/penulis/" class="text-decoration-none">{{ $buku->user->name }}</a> | <a href="/kategori/" class="text-decoration-none">{{ $buku->kategori->nama }}</a></h6>
                
                <h6 class="mt-4">Pengarang : {{ $buku->pengarang }}</h6>
                <h6>Penerbit : {{ $buku->penerbit }}</h6>
                <h6>Tebal Buku : {{ $buku->tebal_buku }} Halaman</h6>
                <p style="text-align: justify;">{!! nl2br($buku->isi) !!}</p>
                
                <a href="/buku" class="btn btn-dark">Kembali ke Buku</a>
            </div>
        </div>
    </div>
@endsection