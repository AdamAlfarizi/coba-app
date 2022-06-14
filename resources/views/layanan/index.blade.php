@extends('layanan.layout.main')
@section('container')
    <div class="container">
        <div class="page-heading lg-6">
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Layanan Mandiri</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($layanan as $layanan)
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="layanan/surat/{{ $layanan->kategori }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">{{ $layanan->nama_layanan }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </section>
    </div>
@endsection
