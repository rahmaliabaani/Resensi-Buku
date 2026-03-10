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
            <div class="col-md-12">
                {{-- error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- success --}}
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
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
                            <td>{{ $bkP->judul }}</td>
                            <td>{{ $bkP->kategori->nama }}</td>
                            <td>{{ $bkP->pengarang }}</td>
                            <td>{{ $bkP->penerbit }}</td>
                            <td>{{ $bkP->tahun_terbit }}</td>
                            <td><a href="{{ route('pengguna.data-resensi.edit', $bkP->slug) }}" type="submit" class="btn btn-warning btn-sm mb-2"><i class="bi bi-pencil-fill"></i> Ubah</a> 
                                <form action="{{ route('pengguna.data-resensi.destroy', $bkP->slug) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    setTimeout(() => {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>
@endsection