@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body shadow-sm text-primary">
                        <h1 class="text-center font-main">Masuk</h1>
                        @if (session('msg'))
                        <div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
                            {!! session('msg') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form method="POST" action="{{route('user_login')}}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Username" required>
                                <div class="invalid-feedback">
                                    Tidak boleh kosong.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                                <div class="invalid-feedback">
                                    Tidak boleh kosong.
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block mt-4">MASUK</button>
                            <small>Belum punya akun? <a href="{!!url('register')!!}">Daftar</a></small>
                            <a href="{!!url('/')!!}"><p class="text-center mt-2">&larr; Beranda.</p></a>
                        </form>
                        <script>
                            
                            (function () {
                                'use strict';
                                window.addEventListener('load', function () {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function (form) {
                                        form.addEventListener('submit', function (event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
