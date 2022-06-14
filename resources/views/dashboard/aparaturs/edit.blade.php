@extends('dashboard.layouts.main')
@section('aparatur', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Aparatur</h1>
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
                            <form class="form mb-5" method="post" action="/dashboard/aparatur/{{ $aparatur->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" required autofocus
                                                value="{{ old('nama', $aparatur->nama) }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" required
                                                value="{{ old('alamat', $aparatur->alamat) }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                id="tgl_lahir" name="tgl_lahir" required
                                                value="{{ old('tgl_lahir', $aparatur->tgl_lahir) }}">
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_hp" class="form-label">No Hp</label>
                                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                                id="no_hp" name="no_hp" required
                                                value="{{ old('no_hp', $aparatur->no_hp) }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                                id="jabatan" name="jabatan" required
                                                value="{{ old('jabatan', $aparatur->jabatan) }}">
                                            @error('jabatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image" class="form-label">Berita image</label>
                                            <input type="hidden" name="oldImage" value="{{ $aparatur->image }}">
                                            @if ($aparatur->image)
                                                <img src="{{ asset('storage/' . $aparatur->image) }}"
                                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                            @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                            @endif
                                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                                id="image" name="image" onchange="previewImage()">
                                            @error('image')
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
        function previewImage() {
            const image = document.querySelector('#image');
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
