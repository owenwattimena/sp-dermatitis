@extends('pakar.templates.layout')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <form>
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Penyakit
                    <p style="font-size: 8pt;" class="mt-1">Detail data</p> 
                </h2> 
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h1 class="mb-0">{{$penyakit->nama_penyakit}}</h1>
                <h5><i>{{$penyakit->kode_penyakit}}</i></h5>
                <h6 class="mt-3">Pengertian</h6>
                <p>{!!$penyakit->pengertian!!}</p>
            
                <h6>Saran</h6>
                <p>{!!$penyakit->saran!!}</p>
            
            </div>
        </div>
    </form>                                        
</div>
@endsection