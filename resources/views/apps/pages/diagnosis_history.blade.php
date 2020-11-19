@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2 pb-5 text-center">
                <img class="mx-auto d-block" width="500" src="{{asset('assets/apps/images/doctor.png')}}" alt="stop-covid">
                <p class="lead">Halo {{\Auth::user()->nama}}, anda telah melakukan {{$jumlah_diagnosa}} kali konsultasi</p>
            </div>
            <div class="col-md-6 order-md-1">
                <h1 class="display-6 text-primary text-center text-md-left mb-3">
                    Riwayat Diagnosa
                </h1>
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">PENYAKIT</th>
                                <th scope="col">NILAI CF</th>
                                <th scope="col">%</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              @forelse ($diagnosa as $data)
                              <tr>
                                <th scope="row">{{$data->tanggal}}</th>
                                <td>{{$data->penyakit->nama_penyakit}}</td>
                                <td>{{$data->nilai_cf}}</td>
                                <td>{{$data->nilai_cf * 100}}</td>
                              </tr>
                              @empty
                                  
                              @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection