@extends('admin.template.main')

@section('container')
<section>
    <div class="container pt-5 mt-2">
        <div class="row pt-5">
            <div class="col-md-12">
                <p class="fs-3 fw-medium">Seluruh Data Resensi</p>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-md-3">
                <form action="{{ route('admin.data-resensi.index') }}" method="GET">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
                        <button class="btn btn-dark" type="submit">Cari</button>
                    </div>
                </form>
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
                        @foreach($buku as $bk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bk->user->name }}</td>
                            <td>{{ $bk->judul }}</td>
                            <td>{{ $bk->kategori->nama }}</td>
                            <td>{{ $bk->pengarang }}</td>
                            <td>{{ $bk->penerbit }}</td>
                            <td>{{ $bk->tahun_terbit }}</td>
                            <td><a href="/admin/data-resensi/{{ $bk->slug }}/ubah" type="button" class="btn btn-warning btn-sm">Ubah</a> <a href="#" type="submit" class="btn btn-danger btn-sm">Hapus</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection