@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('izin_usaha', 'active')
@section('container')


    <div class="row mb-5 py-3">
        <div class="col-lg-8">
            <h2 mb-3> {{ $usaha->jenis_usaha }} </h2>
            <div class="mb-3">
                <a href="/dashboard/villages/" class="btn btn-success"> <span data-feather="arrow-left"></span> Back </a>
                <a href="/dashboard/villages/{{ $usaha->slug }}/edit" class="btn btn-warning"> <span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="//dashboard/villages/{{ $usaha->slug }}" method="post" class="d-inline">
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
                                <td> : {{ $usaha->nama_pengaju }}</td>
                            </tr>
                            <tr>
                                <td>Nama Usaha</td>
                                <td> : {{ $usaha->nama_usaha }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Usaha</td>
                                <td> : {{ $usaha->jenis_usaha }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Usaha</td>
                                <td> :
                                    <img src="{{ asset('storage/' . $usaha->image1) }}" alt="{{ $usaha->image1 }}"
                                        class="aparaturs">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Usaha</td>
                                <td>
                                    :
                                    <img src="{{ asset('storage/' . $usaha->image2) }}" alt="{{ $usaha->image2 }}"
                                        class="aparaturs">
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endsection
