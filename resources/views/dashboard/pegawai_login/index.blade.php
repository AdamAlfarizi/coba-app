@extends('dashboard.layouts.main')

@section('pegawai', 'active')
@section('title', 'Seting Login Pegawai')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto">
        <a href="/dashboard/pegawai_login/create" class="btn btn-primary mb-3">Careate New Status</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $pegawai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pegawai->name }}</td>
                            <td>{{ $pegawai->username }}</td>
                            <td>{{ $pegawai->email }}</td>
                            <td>{{ $pegawai->password }}</td>
                            <td>
                                <a href="/dashboard/pegawai_login/{{ $pegawai->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/pegawai_login/{{ $pegawai->id }}" method="post"
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
