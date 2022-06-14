@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('izin_usaha', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Surat Kematian </h1>
    </div>




    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post" action="/dashboard/surat_keterangan_meninggal"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="card-header">
                                        <h4 class="card-title">Form pembuatan surat kematian</h4>
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
                                            <label for="nama_yang_meninggal" class="form-label">Nama Yang
                                                Meninggal</label>
                                            <input placeholder="Nama Usaha" type="text"
                                                class="form-control @error('nama_yang_meninggal') is-invalid @enderror"
                                                id="nama_yang_meninggal" name="nama_yang_meninggal" required
                                                value="{{ old('nama_yang_meninggal') }}">
                                            @error('nama_yang_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_ktp_yang_meninggal" class="form-label">No Ktp Yang
                                                Meninngal</label>
                                            <input placeholder="Jenis Usaha" type="number"
                                                class="form-control @error('no_ktp_yang_meninggal') is-invalid @enderror"
                                                id="no_ktp_yang_meninggal" name="no_ktp_yang_meninggal" required autofocus
                                                value="{{ old('no_ktp_yang_meninggal') }}">
                                            @error('no_ktp_yang_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tgl_meninggal" class="form-label">Tgl Meninggal</label>
                                            <input placeholder="Jenis Usaha" type="date"
                                                class="form-control @error('tgl_meninggal') is-invalid @enderror"
                                                id="tgl_meninggal" name="tgl_meninggal" required autofocus
                                                value="{{ old('tgl_meninggal') }}">
                                            @error('tgl_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin_yang_meninggal" class="form-label">Jeniskelamin
                                                Yang
                                                Meninggal</label>
                                            <input placeholder="Jenis Usaha" type="text"
                                                class="form-control @error('jenis_kelamin_yang_meninggal') is-invalid @enderror"
                                                id="jenis_kelamin_yang_meninggal" name="jenis_kelamin_yang_meninggal"
                                                required autofocus value="{{ old('jenis_kelamin_yang_meninggal') }}">
                                            @error('jenis_kelamin_yang_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_meninggal" class="form-label">Tempat
                                                Meninggal</label>
                                            <input placeholder="Jenis Usaha" type="text"
                                                class="form-control @error('tempat_meninggal') is-invalid @enderror"
                                                id="tempat_meninggal" name="tempat_meninggal" required autofocus
                                                value="{{ old('tempat_meninggal') }}">
                                            @error('tempat_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_pemakaman" class="form-label">Tempat Pemakaman</label>
                                            <input placeholder="Jenis Usaha" type="text"
                                                class="form-control @error('tempat_pemakaman') is-invalid @enderror"
                                                id="tempat_pemakaman" name="tempat_pemakaman" required autofocus
                                                value="{{ old('tempat_pemakaman') }}">
                                            @error('tempat_pemakaman')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat_yang_meninggal" class="form-label">Alamat Yang
                                                Meninggal</label>
                                            <input placeholder="Jenis Usaha" type="text"
                                                class="form-control @error('alamat_yang_meninggal') is-invalid @enderror"
                                                id="alamat_yang_meninggal" name="alamat_yang_meninggal" required autofocus
                                                value="{{ old('alamat_yang_meninggal') }}">
                                            @error('alamat_yang_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kewarganegaraan_yang_meninggal"
                                                class="form-label">Kewarganegaraan Yang
                                                Meninggal</label>
                                            <input placeholder="Jenis Usaha" type="text"
                                                class="form-control @error('kewarganegaraan_yang_meninggal') is-invalid @enderror"
                                                id="kewarganegaraan_yang_meninggal" name="kewarganegaraan_yang_meninggal"
                                                required autofocus value="{{ old('kewarganegaraan_yang_meninggal') }}">
                                            @error('kewarganegaraan_yang_meninggal')
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
