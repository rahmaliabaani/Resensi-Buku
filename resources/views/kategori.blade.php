@extends('layouts.main')

@section('container')
<div class="container py-5 mt-5">
    <h2 class="text-center">{{ $title }}</h2>

    <div class="row">
        <ul class="nav nav-tabs" id="kategoriTab" role="tablist">
            @foreach($kategori as $kt)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($loop->first) active @endif" id="tab-{{ $kt->id }}" data-bs-toggle="tab" data-bs-target="#content-{{ $kt->id }}" type="button" role="tab">{{ $kt->nama }}</button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content mt-3" id="kategoriTabContent">
            @foreach($kategori as $kt)
                <div class="tab-pane fade @if($loop->first) show active @endif" id="content-{{ $kt->id }}" role="tabpanel">
                    @if($kt->buku->isEmpty())
                        <p>Tidak ada buku dalam kategori ini.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Tahun Terbit</th>
                                    <th>Tebal Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kt->buku as $bk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bk->judul }}</td>
                                        <td>{{ $bk->pengarang }}</td>
                                        <td>{{ $bk->tahun_terbit }}</td>
                                        <td>{{ $bk->tebal_buku }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection