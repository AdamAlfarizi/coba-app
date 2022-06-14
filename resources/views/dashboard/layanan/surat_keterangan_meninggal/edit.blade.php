@extends('dashboard.layouts.main')
@section('data', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit </h1>
    </div>




    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post"
                                action="/dashboard/surat_izin_usaha/{{ $usaha->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                                            <input type="text"
                                                class="form-control @error('nama_pengaju') is-invalid @enderror"
                                                id="nama_pengaju" name="nama_pengaju" required autofocus
                                                value="{{ old('nama_pengaju', $usaha->nama_pengaju) }}">
                                            @error('nama_pengaju')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_usaha" class="form-label">Nama Usaha</label>
                                            <input type="text"
                                                class="form-control @error('nama_usaha') is-invalid @enderror"
                                                id="nama_usaha" name="nama_usaha" required
                                                value="{{ old('nama_usaha', $usaha->nama_usaha) }}">
                                            @error('nama_usaha')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                            <input type="text"
                                                class="form-control @error('jenis_usaha') is-invalid @enderror"
                                                id="jenis_usaha" name="jenis_usaha" required
                                                value="{{ old('jenis_usaha', $usaha->jenis_usaha) }}">
                                            @error('jenis_usaha')
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
    <script>
    </script>

@endsection
