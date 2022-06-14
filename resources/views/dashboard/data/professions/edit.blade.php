@extends('dashboard.layouts.main')
@section('data', 'active')
@section('pekerjaan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pekerjaan</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/data/professions/{{ $profession->id }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kelompok" class="form-label">Kelompok</label>
                <input type="string" class="form-control @error('kelompok') is-invalid @enderror" id="kelompok"
                    name="kelompok" required autofocus value="{{ old('kelompok', $profession->kelompok) }}">
                @error('kelompok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah"
                    required value="{{ old('jumlah', $profession->jumlah) }}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Berita</button>
        </form>
    </div>

    <script>
    </script>

@endsection
