@extends('dashboard.layouts.main')

@section('data', 'active')
@section('pekerjaan', 'active')

@section('title', 'Data Pekerjaan')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-8">
        <div class="card" class="active">
            <div class="card-body">
                <div class="card-header">
                    <h4>Chart Pekerjaan</h4>
                </div>
                <div id="chart-profile-visit"></div>
            </div>
            <div class="card-header text-center">
                <h4>Table Pekerjaan</h4>
            </div>
            <div>
                <a href="/dashboard/data/professions/create" class="btn btn-primary mb-3">Careate New Status</a>
            </div>
            <div class="table-responsive col-lg-auto">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pekerjaan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profession as $professi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $professi->kelompok }}</td>
                                <td>{{ $professi->jumlah }}</td>
                                <td>
                                    <a href="/dashboard/data/professions/{{ $professi->id }}/edit"
                                        class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/data/professions/{{ $professi->id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><span
                                                data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{ $total }}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
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

        var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'),
            optionsVisitorsProfile);
        chartVisitorsProfile.render();
    </script>
@endpush
