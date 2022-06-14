@extends('dashboard.layouts.main')

@section('aparatur', 'active')
@section('title', 'Category Berita')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto">
        <a href="/dashboard/aparatur/create" class="btn btn-primary mb-3">Careate New Status</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table style="text-align: center" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tangal Lahir</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Poto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aparatur as $aparatur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $aparatur->nama }}</td>
                            <td>{{ $aparatur->alamat }}</td>
                            <td>{{ $aparatur->tgl_lahir }}</td>
                            <td>{{ $aparatur->no_hp }}</td>
                            <td>{{ $aparatur->jabatan }}</td>
                            <td>
                                <div style="max-height: 150px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $aparatur->image) }}" alt="{{ $aparatur->name }}"
                                        class="aparaturs">
                                </div>
                            </td>
                            <td>
                                <a href="/dashboard/aparatur/{{ $aparatur->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/aparatur/{{ $aparatur->id }}" method="post"
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
