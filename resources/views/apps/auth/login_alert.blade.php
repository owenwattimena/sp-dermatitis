@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-5">
        <img class="mx-auto d-block img-fluid" width="190" src="{{asset('assets/apps/images/stetoskop.png')}}"" alt="stetoskop">
        <h1 class="display-5 text-primary text-center">Anda belum login!</h1>
        <div class="row justify-content-center">
            <div class="col-6">
                <p class="lead text-center">Anda harus login untuk dapat mengakses menu Konsultasi!<br>
                    Jika sudah memiliki akun silahkan masuk, jika belum silahkan daftar.</p>
            </div>
        </div>
        <div class="text-center">
            <a href="{!!url('login')!!}" class="btn btn-outline-success mb-2 btn-sm-block">Masuk</a>
            <a href="{!!url('register')!!}" class="btn btn-success mb-2 btn-sm-block">Daftar</a>
        </div>

    </div>
</div>
@endsection
