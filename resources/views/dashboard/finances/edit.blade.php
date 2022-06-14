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
                            <form class="form mb-5" method="post" action="/dashboard/finances/{{ $finance->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" required autofocus
                                                value="{{ old('title', $finance->title) }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jumlah" class="form-label">Jumlah</label>
                                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" required
                                                value="{{ old('jumlah', $finance->jumlah) }}">
                                            @error('jumlah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="belanja" class="form-label">Belanja</label>
                                            <input type="text" class="form-control @error('belanja') is-invalid @enderror"
                                                id="belanja" name="belanja" required
                                                value="{{ old('belanja', $finance->belanja) }}">
                                            @error('belanja')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sisa" class="form-label">Sisa</label>
                                            <input type="text" class="form-control @error('sisa') is-invalid @enderror"
                                                id="sisa" name="sisa" required value="{{ old('sisa', $finance->sisa) }}">
                                            @error('sisa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text" class="form-control @error('category') is-invalid @enderror"
                                                id="category" name="category" required
                                                value="{{ old('category', $finance->category) }}">
                                            @error('category')
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
