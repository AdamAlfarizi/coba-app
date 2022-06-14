@extends('dashboard.layouts.main')
@section('data', 'active')
@section('agama', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Agama</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/data/religions/{{ $religion->id }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="agama" class="form-label">agama</label>
                <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" required
                    autofocus value="{{ old('agama', $religion->agama) }}">
                @error('agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah"
                    required value="{{ old('jumlah', $religion->jumlah) }}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Agama</button>
        </form>
    </div>

    <script>
    </script>

@endsection
