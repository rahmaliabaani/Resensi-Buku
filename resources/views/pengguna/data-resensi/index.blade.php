@extends('admin.template.main')

@section('container')
<section>
    <div class="container pt-5 mt-2">
        <div class="row pt-5">
            <div class="col-md-12">
                <p class="fs-3 fw-medium">Data Resensi Buatan {{ $namaPengguna }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-2">
                <form action="{{ route('pengguna.data-resensi.index') }}" method="GET">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
                        <button class="btn btn-dark" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="col-md-9 d-flex mt-2 mb-2 justify-content-md-end">
                <a href="/pengguna/data-resensi/tambah" type="button" class="btn btn-primary btn-sm "><i class="bi bi-clipboard-plus-fill"></i> Tambah</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Penulis Resensi</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukuPengguna as $bkP)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bkP->user->name }}</td>
                            <td>{{ $bkP->judul }}</td>
                            <td>{{ $bkP->kategori->nama }}</td>
                            <td>{{ $bkP->pengarang }}</td>
                            <td>{{ $bkP->penerbit }}</td>
                            <td>{{ $bkP->tahun_terbit }}</td>
                            <td><a href="{{ route('pengguna.data-resensi.edit', $bkP->slug) }}" type="submit" class="btn btn-warning btn-sm">Ubah</a> <a href="#" type="submit" class="btn btn-danger btn-sm">Hapus</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection