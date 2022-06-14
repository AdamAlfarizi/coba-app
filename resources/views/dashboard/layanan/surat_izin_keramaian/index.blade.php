@extends('dashboard.layouts.main')

@section('layanan', 'active')
@section('izin_keramaian', 'active')
@section('title', 'Surat Izin Keramaian')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-auto">
        <a href="/dashboard/surat_izin_keramaian/create" class="btn btn-primary mb-3">Careate New Status</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengaju</th>
                        <th scope="col">Nama Usaha</th>
                        <th scope="col">Jenis Usaha</th>
                        <th scope="col">Setatus</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat_izin_keramaian as $keramaian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $keramaian->nama_pengaju }}</td>
                            <td>{{ $keramaian->kegiatan }}</td>
                            <td>{{ $keramaian->jenis }}</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <a href="/dashboard/surat_izin_keramaian/{{ $keramaian->id }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                                <a href="/dashboard/surat_izin_keramaian/{{ $keramaian->id }}/edit"
                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/dashboard/surat_izin_keramaian/{{ $keramaian->id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
