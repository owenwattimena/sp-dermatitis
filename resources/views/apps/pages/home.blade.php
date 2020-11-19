@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 order-md-2 pb-5">
                <img class="mx-auto d-block main-icon img-fluid" src="{{asset('assets/apps/images/human-skin.png')}}" alt="Kulit Manusia">
            </div>
            <div class="col-md-6 order-md-1">
                <h1 class="display-5 text-primary text-center text-md-left">Sistem Pakar Diagnosa Penyakit Dermatitis</h1>
                <p class="lead text-center text-md-left">Lindungi kulit anda dari penyakit Dermatitis</p>
                <div class="text-center text-md-left">
                    <a href="{!!url('consultation-now')!!}" class="btn btn-danger">Konsultasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection