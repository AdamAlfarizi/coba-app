@extends('dashboard.layouts.main')

@section('informasi-keuangan', 'active')
@section('title', 'Informasi Keuangan')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="col-auto">

            <div class="card-body">
                <div id="chart-profile-visit"></div>
            </div>
        </div>
    </div>


    <div class="col-auto">
        <a href="/dashboard/finances/create" class="btn btn-primary mb-3">Careate New Status</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Belanja</th>
                        <th scope="col">Sisa</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($finances as $finance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $finance->title }}</td>
                            <td>{{ $finance->jumlah }}</td>
                            <td>{{ $finance->belanja }}</td>
                            <td>{{ $finance->sisa }}</td>
                            <td>{{ $finance->category }}</td>
                            <td>
                                <a href="/dashboard/finances/{{ $finance->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/finances/{{ $finance->id }}" method="post"
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

@push('scripts')
    <script>
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'Jumlah Pekerja',
                data: {!! $jumlah_data !!}
            }],
            colors: '#435ebe',
            xaxis: {
                categories: {!! $data !!}
                    // ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"]
                    ,
            },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();
    </script>
@endpush
