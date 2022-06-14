@extends('layanan.layout.main')
@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulir Surat Kematian</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post" action="/layanan/surat/kematian"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                                            <input placeholder="Nama Yang Mengajukan surat " type="text"
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
                                            <label for="no_ktp_si_mati" class="form-label">No Ktp</label>
                                            <input placeholder="No Ktp Yang Meningga" type="text"
                                                class="form-control @error('no_ktp_si_mati') is-invalid @enderror"
                                                id="no_ktp_si_mati" name="no_ktp_si_mati" required
                                                value="{{ old('no_ktp_si_mati') }}">
                                            @error('no_ktp_si_mati')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_si_mati" class="form-label">Nama</label>
                                            <input placeholder="Nama Yang Meninggal" type="text"
                                                class="form-control @error('nama_si_mati') is-invalid @enderror"
                                                id="	nama_si_mati" name="nama_si_mati" required autofocus
                                                value="{{ old('nama_si_mati') }}">
                                            @error('nama_si_mati')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tgl_kematian" class="form-label">Tanggal Kematian</label>
                                            <input placeholder="Tanggal Kematian" type="date"
                                                class="form-control @error('tgl_kematian') is-invalid @enderror"
                                                id="tgl_kematian" name="tgl_kematian" required autofocus
                                                value="{{ old('tgl_kematian') }}">
                                            @error('tgl_kematian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_kematian" class="form-label">Tempat Kematian</label>
                                            <input placeholder="tempat_kematian" type="text"
                                                class="form-control @error('tempat_kematian') is-invalid @enderror"
                                                id="tempat_kematian" name="tempat_kematian" required autofocus
                                                value="{{ old('tempat_kematian') }}">
                                            @error('tempat_kematian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_pemakaman" class="form-label">Tempat Pemakaman</label>
                                            <input placeholder="tempat_pemakaman" type="text"
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
                                            <label for="ktp_si_mati" class="form-label">Ktp</label>
                                            <input placeholder="ktp_si_mati" type="text"
                                                class="form-control @error('ktp_si_mati') is-invalid @enderror"
                                                id="ktp_si_mati" name="ktp_si_mati" required autofocus
                                                value="{{ old('ktp_si_mati') }}">
                                            @error('ktp_si_mati')
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class=" card col-lg-auto">
            <div class="table-responsive col-lg-auto">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <td scope="col">No</td>
                            <td scope="col">Nama Pengaju</td>
                            <td scope="col">No Ktp yang Meninggal</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kematian as $kematian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kematian->nama_pengaju }}</td>
                                <td>{{ $kematian->no_ktp_si_mati }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
