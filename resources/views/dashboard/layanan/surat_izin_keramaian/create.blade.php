@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('izin_keramaian', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Surat Izin Usaha </h1>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post" action="/dashboard/surat_izin_keramaian"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="card-header">
                                        <h4 class="card-title">Form pembuatan surat</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                                            <input placeholder="Nama Pengaju" type="text"
                                                class="form-control @error('nama_pengaju') is-invalid @enderror"
                                                id="nama_pengaju" name="nama_pengaju" required autofocus
                                                value="{{ old('nama_pengaju') }}">
                                            @error('nama_pengaju')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kegiatan" class="form-label">Kegiatan</label>
                                            <input placeholder="Nama Usaha" type="text"
                                                class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan"
                                                name="kegiatan" required value="{{ old('kegiatan') }}">
                                            @error('kegiatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis" class="form-label">Jenis</label>
                                            <input placeholder="Jenis Usaha" type="text"
                                                class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                                name="jenis" required autofocus value="{{ old('jenis') }}">
                                            @error('jenis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Dokumen persaratan</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image1" class="form-label">image1</label>
                                            <img class="img-preview aparatur mb-3 col-sm-5">
                                            <input class="form-control @error('image1') is-invalid @enderror" type="file"
                                                id="image1" name="image1" onchange="previewImage()">
                                            @error('image1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image2" class="form-label">image2</label>
                                            <img class="img-preview aparatur mb-3 col-sm-5">
                                            <input class="form-control @error('image2') is-invalid @enderror" type="file"
                                                id="image2" name="image2" onchange="previewImage()">
                                            @error('image2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewImage() {
            const image = document.querySelector('#image1');
            const image = document.querySelector('#image2');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
