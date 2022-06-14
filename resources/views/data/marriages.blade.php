@extends('layouts.main')
@section('container')

  @if (session()->has('success'))

  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success')}}
  </div>
      
  @endif
<div class="container">
  <div class="row">
    <div class="col-lg-8 widh">

      <div class="card">
        <div class="card-body">
          <h3>Demografi Berdasarkan Perkawinan</h3>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
            <h4 class="align-center">Grafik Perkawinan</h4>
        </div>
        <div class="card-body">
            <div id="chart-visitors-profile"></div>
        </div>
      </div>
      <div class="col-auto">
      </div>

      <div class="card">
        <div class="card-body">
          <h4>Tabel Perkawinan</h4>
        </div>
      </div>

        <div class="card">
            <div class="table-responsive col-lg-auto">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Status Pernikahan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">%</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($marriage as $post)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$post->status}}</td>
                      <td>{{$post->jumlah}}</td>
                      <td> 
                      </td>
                    </tr>
                    @endforeach
                    <tr>
                      <td></td>
                      <td>Total</td>
                      <td>364362</td>
                      <td> 100%</td>
                    </tr>
                </tbody>
              </table>
          </div>
      </div>
    </div>
    @include('partials.nav')
  </div>
</div>


@endsection

@push('scripts')
    
<script>
        var optionsVisitorsProfile  = {
        series: {!! $jumlah_data !!},
        labels: {!! $data !!},
        colors: ['#435ebe','#55c6e8','#5350e9','#5w36e8'],
        chart: {
          type: 'donut',
          width: '100%',
          height:'350px'
        },
        legend: {
          position: 'bottom'
        },
        plotOptions: {
          pie: {
            donut: {
              size: '30%'
            }
          }
        }
      }
        var optionsProfileVisit = {
          annotations: {
            position: 'back'
          },
          dataLabels: {
            enabled:false
          },
          chart: {
            type: 'bar',
            height: 300
          },
          fill: {
            opacity:1
          },
          plotOptions: {
          },
          series: [{
            name: 'Jumlah Pekerja',
            data: {!! $jumlah_data !!} 
          }],
          colors: '#435ebe',
          xaxis: {
            categories: 
              {!! $data !!}
            // ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"]
            ,
          },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();

        var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile);
        chartVisitorsProfile.render();
</script>
@endpush