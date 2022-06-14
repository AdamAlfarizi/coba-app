@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('izin_usaha', 'active')
@section('container')


    <div class="row mb-5 py-3">
        <div class="col-lg-8">
            <h2 mb-3> {{ $kematian->nama_pengaju }} </h2>
            <div class="mb-3">
                <a href="/dashboard/villages/" class="btn btn-success"> <span data-feather="arrow-left"></span> Back </a>
                <a href="/dashboard/villages/{{ $kematian->slug }}/edit" class="btn btn-warning"> <span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="//dashboard/villages/{{ $kematian->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                            data-feather="x-circle"></span>Delete</button>
                </form>
            </div>
            <div class="card">
                <div class="table-responsive col-lg-auto">
                    <table class="table table-striped table-sm ">
                        <thead>
                            <tr>
                                <th scope="col">-</th>
                                <th scope="col">-</th>
                            </tr>
                            <tr>
                                <td>Nama Pengaju</td>
                                <td> : {{ $kematian->nama_pengaju }}</td>
                            </tr>
                            <tr>
                                <td>Nama Yang Meninggal</td>
                                <td> : {{ $kematian->nama_yang_meninggal }}</td>
                            </tr>
                            <tr>
                                <td>No Ktp Yang Meninggal</td>
                                <td> : {{ $kematian->no_ktp_yang_meninggal }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Meninggal</td>
                                <td> : {{ $kematian->tgl_meninggal }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin Yang Meninggal</td>
                                <td> : {{ $kematian->jenis_kelamin_yang_meninggal }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Meninggal</td>
                                <td> : {{ $kematian->tempat_meninggal }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Pemakaman</td>
                                <td> : {{ $kematian->tempat_pemakaman }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Yang Meninggal</td>
                                <td> : {{ $kematian->alamat_yang_meninggal }}</td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan yang Meninggal</td>
                                <td> : {{ $kematian->kewarganegaraan_yang_meninggal }}</td>
                            </tr>

                            <tr>
                                <td>Jenis Usaha</td>
                                <td> :
                                    <img src="{{ asset('storage/' . $kematian->image1) }}"
                                        alt="{{ $kematian->image1 }}" class="aparaturs">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Usaha</td>
                                <td>
                                    :
                                    <img src="{{ asset('storage/' . $kematian->image2) }}"
                                        alt="{{ $kematian->image2 }}" class="aparaturs">
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endsection
