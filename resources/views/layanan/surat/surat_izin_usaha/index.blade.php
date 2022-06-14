@extends('layanan.layout.main')
@section('container')
    @if (session()->has('success'))
        <div class="container">

            <div class="alert alert-success col-lg-auto" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="container">
        <div class="mb-3">
            <a href="/layanan" class="btn btn-success"> <span data-feather="arrow-left"></span> Back </a>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="container">

            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form mb-5" method="post" action="/surat_izin_usaha"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="card-header">
                                            <h4 class="card-title">Form pembuatan surat</h4>
                                        </div>
                                        <div class="col-md-4 col-8">
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
                                        <div class="col-md-4 col-8">
                                            <div class="form-group">
                                                <label for="nama_usaha" class="form-label">Nama Usaha</label>
                                                <input placeholder="Nama Usaha" type="text"
                                                    class="form-control @error('nama_usaha') is-invalid @enderror"
                                                    id="nama_usaha" name="nama_usaha" required
                                                    value="{{ old('nama_usaha') }}">
                                                @error('nama_usaha')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-8">
                                            <div class="form-group">
                                                <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                                <input placeholder="Jenis Usaha" type="text"
                                                    class="form-control @error('jenis_usaha') is-invalid @enderror"
                                                    id="jenis_usaha" name="jenis_usaha" required autofocus
                                                    value="{{ old('jenis_usaha') }}">
                                                @error('jenis_usaha')
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
                                        <div class="col-md-4 col-8">
                                            <div class="form-group">
                                                <label for="image1" class="form-label">image1</label>
                                                <img class="img-preview  mb-3">
                                                <input class="form-control @error('image1') is-invalid @enderror"
                                                    type="file" id="image1" name="image1" onchange="previewImage2()">
                                                @error('image1')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-8">
                                            <div class="form-group">
                                                <label for="image2" class="form-label">image2</label>
                                                <img class="img-preview  mb-3">
                                                <input class="form-control @error('image2') is-invalid @enderror"
                                                    type="file" id="image2" name="image2" onchange="previewImage2()">
                                                @error('image2')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
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
                            <td scope="col">Nama Usaha</td>
                            <td scope="col">Jenis Usaha</td>
                            <th scope="col">Setatus</th>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat_izin_usaha as $usaha)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $usaha->nama_pengaju }}</td>
                                <td>{{ $usaha->nama_usaha }}</td>
                                <td>{{ $usaha->jenis_usaha }}</td>
                                <td>
                                    <span class="badge bg-success">Prose</span>
                                </td>
                                <td>
                                    <form action="surat_izin_usaha/{{ $usaha->id }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><span
                                                data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
