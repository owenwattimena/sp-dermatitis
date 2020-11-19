<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/apps/css/main.css')}}">
    @yield('style')
    <title>SISTEM PAKAR DIAGNOSA PENYAKIT DERMATITIS</title>
</head>

<body class="user">
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="{!!url('/')!!}">SP Dermatitis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="margin-right: 50px;">
                <li class="nav-item {{\Route::current()->getName() == "home" ? "active" : ""}}">
                    <a class="nav-link" href="{!!url('/')!!}">Beranda</a>
                </li>
                <li class="nav-item {{\Route::current()->getName() == "consultation_now" ? "active" : ""}}">
                    <a class="nav-link" href="{!!url('consultation-now')!!}">Konsultasi</a>
                </li>
                <li class="nav-item {{\Route::current()->getName() == "about_dermatitis" ? "active" : ""}}">
                    <a class="nav-link" href="{!!url('about-dermatitis')!!}">Tentang Dermatitis</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="user-info"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, {{Auth::user()->nama}}
                </button>
                <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuOffset">
                    
                    <a class="dropdown-item" href="{!!url('/diagnosis-history')!!}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-check"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                    </svg>
                    Hasil Diagnosa</a>
                    <a class="dropdown-item" href="{!!url('/profile')!!}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('user_logout')}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-power"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                        d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z" />
                        <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" />
                    </svg>
                    Keluar</a>
                </div>
            </div>
            @else
            <a href="{!!url('login')!!}" class="btn btn-link">Masuk</a>
            <a href="{!!url('register')!!}" class="btn btn-success">Daftar</a>
            @endif
        </ul>
    </div>
</div>
</nav>
{{-- END NAVBAR --}}

{{-- @if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul class="m-0">
        <li>{{ $error }}</li>
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif --}}
{{-- CONTENT --}}
@yield('content')
{{-- END CONTENT --}}

{{-- FOOTER --}}
<div class="footer bg-secondary">
    <div class="container py-5 text-white">
        <h1>SP Dermatitis</h1>
        <div class="row">
            <div class="col-md-9">
                <p>Kenali, Pahami, Obati</p>
            </div>
            <div class="col-md-3">
                <h6>Menu</h6>
                <ul class="list-unstyled">
                    <li><a href="{!!url('/')!!}">Beranda</a></li>
                    <li><a href="{!!url('consultation-now')!!}">Konsultasi</a></li>
                    <li><a href="{!!url('about-dermatitis')!!}">Tentang Dermatitis</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container text-white">
        <hr>
    </div>
    <footer class="text-center text-white">
        <a href="https://owenwattimena.github.io" target="_blank">
            <p class="m-0 p-3">Made with <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill"
                fill="red" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
            </svg> from Ambon.</p>
        </a>
    </footer>
</div>
{{-- END FOOTER --}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
crossorigin="anonymous"></script>

@yield('script')
</body>

</html>