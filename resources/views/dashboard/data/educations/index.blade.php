@extends('dashboard.layouts.main')

@section('data', 'active')
@section('pendidikan', 'active')
@section('title', 'Data Pendidikan')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4>Chart Pendidikan</h4>
                </div>
                <div id="chart-profile-visit"></div>
            </div>
            <div class="card-header text-center">
                <h4>Table Pendidikan</h4>
            </div>
            <div>
                <a href="/dashboard/data/educations/create" class="btn btn-primary mb-3">Careate New Status</a>
            </div>
            <div class="table-responsive col-lg-auto">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($education as $educati)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $educati->pendidikan }}</td>
                                <td>{{ $educati->jumlah }}</td>
                                <td>
                                    <a href="/dashboard/data/educations/{{ $educati->id }}/edit"
                                        class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/data/educations/{{ $educati->id }}" method="post"
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
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>{{ $total }}</td>
                            <td></td>
                        </tr>
                    </tbody>
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
