@extends('dashboard.layouts.main')
@section('data2', 'active')
@section('container')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Potensi Desa</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Horizontal Navs</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <td scope="col">No</td>
                                        <td scope="col">Agama</td>
                                        <td scope="col">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data }}</td>
                                            <td>{{ $data }}</td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            Integer interdum diam eleifend metus lacinia, quis gravida eros mollis. Fusce non sapien
                            sit amet magna dapibus
                            ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum non. Duis a mauris ex.
                            Ut finibus risus sed massa
                            mattis porta. Aliquam sagittis massa et purus efficitur ultricies. Integer pretium dolor
                            at sapien laoreet ultricies.
                            Fusce congue et lorem id convallis. Nulla volutpat tellus nec molestie finibus. In nec
                            odio tincidunt eros finibus
                            ullamcorper. Ut sodales, dui nec posuere finibus, nisl sem aliquam metus, eu accumsan
                            lacus felis at odio. Sed lacus
                            quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et quam vel
                            massa pretium ullamcorper vitae eu
                            tortor.
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <p class="mt-2">Duis ultrices purus non eros fermentum hendrerit. Aenean ornare
                                interdum
                                viverra. Sed ut odio velit. Aenean eu diam
                                dictum nibh rhoncus mattis quis ac risus. Vivamus eu congue ipsum. Maecenas id
                                sollicitudin ex. Cras in ex vestibulum,
                                posuere orci at, sollicitudin purus. Morbi mollis elementum enim, in cursus sem
                                placerat ut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/dashboard/villages/create" class="btn btn-primary mb-3">Careate New post</a>
    <div class=" card col-lg-auto">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <td scope="col">No</td>
                        <td scope="col">nama</td>
                        <td scope="col">Tempat Lahir</td>
                        <td scope="col">Tanggal lahir</td>
                        <td scope="col">Jenis Kelamin</td>
                        <td scope="col">Golongan Darah</td>
                        <td scope="col">Alamat</td>
                        <td scope="col">Agama</td>
                        <td scope="col">Pendidikan</td>
                        <td scope="col">Status Perkawinan</td>
                        <td scope="col">Pekerjaan</td>
                        <td scope="col">action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penduduk as $penduduk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->tmp_lahir }}</td>
                            <td>{{ $penduduk->tgl_lahi }}</td>
                            <td>{{ $penduduk->jns_kel }}</td>
                            <td>{{ $penduduk->gol_darah }}</td>
                            <td>{{ $penduduk->alamat }}</td>
                            <td>{{ $penduduk->agama }}</td>
                            <td>{{ $penduduk->pendidikan }}</td>
                            <td>{{ $penduduk->sts_kawin }}</td>
                            <td>{{ $penduduk->pekerjaan }}</td>
                            <td>
                                <a href="/dashboard/penduduks/{{ $penduduk->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                                <a href="/dashboard/penduduks/{{ $penduduk->slug }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/penduduks/{{ $penduduk->slug }}" method="post"
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
