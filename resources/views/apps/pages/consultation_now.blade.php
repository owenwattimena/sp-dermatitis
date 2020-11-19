@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 order-md-2 pb-5">
                <img class="mx-auto d-block" width="300" src="{{asset('assets/apps/images/stetoskop.png')}}" alt="Stetoskop">
            </div>
            <div class="col-md-6 order-md-1">
                <h1 class="display-5 text-primary text-center text-md-left">Konsultasikan Gejala Dermatitis Anda Sekarang Juga!
                </h1>
                <p class="lead text-center text-md-left">Selamat datang, {{Auth::user()->nama}}. Ayo konsultasi?</p>
                <div class="text-center text-md-left">
                    <a href="{{route('consultation')}}" class="btn btn-danger mb-2 btn-sm-block">Konsultasi Sekarang!</a>
                    <a href="{{url('/')}}" class="btn btn-outline-danger mb-2 btn-sm-block">Tidak, lain kali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
