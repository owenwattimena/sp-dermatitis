@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-5 order-md-2 pb-5 text-center">
                <img class="mx-auto d-block img-fluid" src="{{asset('assets/apps/images/diagnosa_result.png')}}" alt="stop-covid">
                <p class="lead">Halo {{\Auth::user()->nama}}, Persentase kemungkinan anda terkena {{$nilai_akhir['penyakit']}} ialah {{ round($nilai_akhir['persentase'], 1) }}%</p>
                <a href="{{route('consultation')}}" class="btn btn-success px-5">Konsultasi Lagi</a>
            </div>
            <div class="col-md-7 order-md-1">
                <h1 class="display-6 text-primary text-center text-md-left">Hasil Diagnosa!
                </h1>

                <div class="card shadow-sm border-0 my-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-bold">Gejala</p>
                                <ol>
                                    @foreach ($gejala as $data)
                                        <li>{{$data['kode']}} : {{$data['nama']}}</li>
                                    @endforeach
                                </ol>
                            </div>
                            {{-- <div class="col-md-6">
                                <p class="font-weight-bold">Data Pendukung</p>
                                <ol>
                                    <li>Batuk</li>
                                </ol>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold">Rule Sesuai Data Gejala dan Data Pendukung</p>
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Penyakit</th>
                                        <th scope="col">Gejala</th>
                                        <th scope="col">Bobot Pakar</th>
                                        <th scope="col">Bobot User</th>
                                        <th scope="col">BP*BU (CF)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($rules as $key => $value)
                        
                                    @foreach ($value['gejala'] as $gejala)
            
                                    <tr>
                                        <th scope="row">{{++$no}}</th>
                                        <td>{{$value['penyakit']}}</td>
                                        <td>{{$gejala['nama']}}</td>
                                        <td>{{$gejala['bobot_pakar']}}</td>
                                        <td>{{$gejala['bobot_user']}}</td>
                                        <td>{{$gejala['bobot_user'] * $gejala['bobot_pakar']}}</td>
                                    </tr>
                                    @endforeach
            
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-bold">Perhitungan CF</p>
                                <ol>
                                    @foreach ($data_CF as $cf)
                                        <li>{{$cf['penyakit']}}</li>
                                        <ul>
                                            @foreach ($cf['CF'] as $list => $value)
                                                <li>CF ke-{{++$list}} : {{round($value, 3)}}</li>
                                            @endforeach
                                            @if(isset($data_CF_combine))
                                            @php $i = 0; @endphp
                                                @foreach ($data_CF_combine as $item => $key)
                                                    @if ($cf['penyakit'] == $key['penyakit'])
                                                        @foreach ($key['CF_Combine'] as $cf_c)
                                                        <li>CF Combine Ke-{{++$i}} : {{ round($cf_c, 3)}}</li>
                                                        @endforeach
                                                    @endif
                                                        
                                                    @php $i=0; @endphp
                                                @endforeach
                                            @endif
                                        </ul>
                                    @endforeach
                                    </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-bold">Hasil Diagnosa</p>
                                <p class="text-center">
                                    Jadi Penyakit dengan CF terbesar adalah <i class="h5">{{$nilai_akhir['penyakit']}} </i> dengan nilai sebesar <u class="h5">{{ round($nilai_akhir['persentase'], 1) }} %</u> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-bold">{{$nilai_akhir['penyakit']}}</p>
                                <p>{!!$penyakit->pengertian!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-bold">Saran / Anjuran</p>
                                <p>{!!$penyakit->saran!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection