@extends('admin.template.main')

@section('container')
<section>
    <div class="container pt-5 mt-2">
        <div class="row pt-5">
            <div class="col-md-12">
                <p class="fs-3 fw-medium">Seluruh Data Pengguna</p>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-md-3">
                <form action="{{ route('admin.data-pengguna.index') }}" method="GET">
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $pgn)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pgn->name }}</td>
                            <td>{{ $pgn->email }}</td>
                            <td><a href="/admin/data-pengguna/{{ $pgn->slug }}/ubah" type="button" class="btn btn-warning btn-sm">Ubah</a> <a href="#" type="submit" class="btn btn-danger btn-sm">Hapus</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection