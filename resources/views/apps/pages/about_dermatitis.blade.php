@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
  <div class="container">
    <div class="row">
      {{-- <div class="col-md-6 order-md-2 pb-5 text-center">
        <img class="mx-auto d-block w-100" src="{{asset('assets/apps/images/doctor.png')}}" alt="stop-covid">
        <p class="lead font-weight-bold">Halo User, apakah anda sedang mengalami hal-hal
          berikut?
        </p>
      </div> --}}
      
      <div class="col-md-12 order-md-1">
        <h1 class="display-6 text-primary text-center text-md-left mb-4">Daftar Penyakit!
        </h1>
        <div class="accordion" id="accordionExample">
          @foreach ($penyakit as $data)
          
          <div class="card">
            <div class="card-header" id="{{$data->id}}">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$data->kode_penyakit}}" aria-expanded="true" aria-controls="{{$data->kode_penyakit}}">
                  {{$data->nama_penyakit}}
                </button>
              </h2>
            </div>
            
            <div id="{{$data->kode_penyakit}}" class="collapse hide" aria-labelledby="{{$data->id}}" data-parent="#accordionExample">
              <div class="card-body">
                {!!$data->pengertian!!}
                {!!$data->saran!!}
              </div>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection