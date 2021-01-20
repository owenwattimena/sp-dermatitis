@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body shadow-sm text-primary">
                        <h1 class="text-center font-main">Daftar</h1>
                        
                        <form action="{{route('register_create')}}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}" placeholder="Masukan nama lengkap anda" required>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" name="email" aria-describedby="emailHelp" placeholder="Masukkan alamat email" required>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan Password" required>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm">Ulang password</label>
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" aria-describedby="emailHelp" placeholder="Ulangi password" required>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" value="{{old('tempat_lahir')}}" name="tempat_lahir" placeholder="Masukan tempat lahir anda" required>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                        @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{old('tanggal_lahir')}}" name="tanggal_lahir" aria-describedby="emailHelp" placeholder="Masukan tanggal lahir anda" required>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                        @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis kelamin</label>
                                <select class="custom-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Tidak boleh kosong.
                                </div>
                                @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="5" required>{{old('alamat')}}</textarea>
                                <div class="invalid-feedback">
                                    Tidak boleh kosong.
                                </div>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block mt-4">DAFTAR</button>
                            <small>Sudah punya akun? <a href="{!!url('login')!!}">Masuk</a></small>
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
