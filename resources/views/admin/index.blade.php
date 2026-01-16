@extends('admin.template.main')

@section('container')
<section>
    <div class="container pt-5 my-4">
        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-md-3">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <p class="card-text">Jumlah Postingan Resensi</p>
                        <p class="fs-2 fw-bold">{{ $totalBuku }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <p class="card-text">Jumlah Kategori Resensi</p>
                        <p class="fs-2 fw-bold">{{ $totalKategori }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <p class="card-text">Jumlah Pengguna Resensi</p>
                        <p class="fs-2 fw-bold">{{ $totalPengguna }}</p>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection