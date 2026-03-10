@extends('admin.template.main')

@section('container')
<section>
    <div class="container pt-5 mt-2">
        <div class="row pt-5">
            <div class="col-md-12">
                <p class="fs-3 fw-medium">Tambah Resensi Anda</p>
            </div>
        </div>
        {{-- Form --}}
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('pengguna.data-resensi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul" class="form-label">Judul Resensi</label>
                    <input class="form-control form-control-sm" id="judul" name="judul" type="text" placeholder="Judul Resensi" value="{{ old('judul') }}">
                </div>
                
                <div class="form-group">
                    <label for="kategori" class="form-label mt-2">Kategori Resensi</label>
                    <select class="form-select form-select-sm" name="kategori_id">
                        <option value="">Pilih Kategori Resensi</option>
                        @foreach($kategori as $ktg)
                            <option value="{{ $ktg->id }}" 
                                {{ old('kategori_id') == $ktg->id ? 'selected' : '' }}>{{ $ktg->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{-- <label for="user_id" class="form-label mt-2">User ID</label> --}}
                    <input class="form-control form-control-sm" id="user_id" name="user_id" type="hidden" placeholder="User ID" value="{{ auth()->user()->id }}">
                </div>
                <div class="form-group">
                    <label for="pengarang" class="form-label mt-2">Pengarang</label>
                    <input class="form-control form-control-sm" id="pengarang" name="pengarang" type="text" placeholder="Pengarang" value="{{ old('pengarang') }}">
                </div>
                <div class="form-group">
                    <label for="penerbit" class="form-label mt-2">Penerbit</label>
                    <input class="form-control form-control-sm" id="penerbit" name="penerbit" type="text" placeholder="Penerbit" value="{{ old('penerbit') }}">
                </div>
                <div class="form-grou">
                    <label for="tahun-terbit" class="form-label mt-2">Tahun Terbit</label>
                    <input class="form-control form-control-sm" id="tahun-terbit" name="tahun_terbit" type="year" placeholder="Tahun Terbit" value="{{ old('tahun-terbit') }}">
                </div>
                <div class="form-group">
                    <label for="tebal-buku" class="form-label mt-2">Tebal Buku</label>
                    <input class="form-control form-control-sm" id="tebal-buku" name="tebal_buku" type="number" placeholder="Tebal Buku" value="{{ old('tebal-buku') }}">
                </div>
                <div class="form-group">
                    <label for="gambar" class="form-label mt-2">Gambar Buku</label>
                    <img id="preview-gambar" src="{{ isset($buku) ? $buku->gambar_url : '' }}" alt="" class="img-fluid mb-2 mt-2" style="max-height: 200px">
                    <input class="form-control form-control-sm" id="gambar" name="gambar" type="file" onchange="previewImage()">
                </div>
                <div class="form-group">
                    <label for="isi" class="form-label mt-2">Isi Resensi</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="isi" name="isi">{{ old('isi') }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <input class="btn btn-primary btn-sm" type="submit" value="Simpan">
                    <a href="/pengguna/data-resensi" class="btn btn-sm btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
function previewImage(){

    const gambar = document.querySelector('input[name=gambar]');
    const preview = document.querySelector('#preview-gambar');

    const fileReader = new FileReader();

    fileReader.readAsDataURL(gambar.files[0]);

    fileReader.onload = function(e){
        preview.src = e.target.result;
    }

}
</script>
@endsection