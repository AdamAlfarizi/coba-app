@extends('dashboard.layouts.main')

@section('layanan', 'active')
@section('keterangan_meninggal', 'active')
@section('title', 'Surat Kematian')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-auto">
        <a href="/dashboard/surat_keterangan_meninggal/create" class="btn btn-primary mb-3">Careate New Status</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengaju</th>
                        <th scope="col">Nama Yang Meninggal</th>
                        <th scope="col">Tanggal Meninggal</th>
                        <th scope="col">Setatus</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat_kematian as $kematian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kematian->nama_pengaju }}</td>
                            <td>{{ $kematian->nama_yang_meninggal }}</td>
                            <td>{{ $kematian->tgl_meninggal }}</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <a href="/dashboard/surat_keterangan_meninggal/{{ $kematian->id }}"
                                    class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/dashboard/dashboard/surat_keterangan_meninggal/{{ $kematian->id }}/edit"
                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/dashboard/dashboard/surat_keterangan_meninggal/{{ $kematian->id }}"
                                    method="post" class="d-inline">
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
