@extends('apps.templates.layout')

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @if (session('msg'))
                <div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
                    {!! session('msg') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if ($errors->any())
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
                @endif
                <div class="card">
                    <div class="card-body shadow-sm text-primary">
                        <div class="text-center">
                            <img src="{{asset('assets/apps/images/user-icon.png')}}" width="100" alt="..." class="img-thumbnail rounded-circle">
                        </div>
                        <h1 class="text-center display-6 my-3">{{\Auth::user()->email}}</h1>
                        
                        <form method="POST" action="{{route('user_profile_put')}}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{\Auth::user()->nama}}" aria-describedby="emailHelp" placeholder="Nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{\Auth::user()->tempat_lahir}}" placeholder="Tempat lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-lahir">Tanggal lahir</label>
                                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir" value="{{date('Y-m-d',strtotime(\Auth::user()->tanggal_lahir))}}" placeholder="Tanggal lahir" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="jenis-kelamin">Jenis kelamin</label>
                                <select class="custom-select" id="jenis-kelamin" name="jenis_kelamin" required>
                                    <option value="l" {{(\Auth::user()->jenis_kelamin == 'l') ? 'selected': ''}}>Laki-laki</option>
                                    <option value="p" {{(\Auth::user()->jenis_kelamin == 'p') ? 'selected': ''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" required>{{\Auth::user()->alamat}}</textarea>
                            </div>
                            {{-- <hr>
                                <div class="card rounded-0" style="border-left: 5px solid #12955F;">
                                    <div class="card-body">  
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Masukkan password" required>
                                            <small>Masukan password sebelum mengubah profil</small>
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <button type="submit" class="btn btn-primary btn-block mt-4">Ubah Profile</button>
                                
                            </form>
                        </div>
                    </div>
                    {{-- PASSWORD --}}
                    <div class="card mt-3">
                        <div class="card-body shadow-sm text-primary">
                            <h4 class="text-center font-main">Ubah Password</h4>
                            <form method="POST" action="{{route('user_password')}}" class="needs-validation" novalidate>
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="password-lama">Password Lama</label>
                                    <input type="password" class="form-control" id="password-lama" name="password" aria-describedby="emailHelp" placeholder="Masukkan password" required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-baru">Password Baru</label>
                                    <input type="password" class="form-control" id="password-baru" name="password_baru" aria-describedby="emailHelp" placeholder="Masukkan password baru" required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ulang-password-baru">Ulangi Password Baru</label>
                                    <input type="password" class="form-control" id="ulang-password-baru" name="password_baru_confirmation" placeholder="Masukan ulang password" required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-secondary btn-block mt-4">Ubah Password</button>
                                
                            </form>
                        </div>
                    </div>

                    {{-- DELETE PROFILE --}}
                    <div class="card mt-3">
                        <div class="card-body text-danger">
                            <div class="text-center">
                                <h4 class="text-center font-main mb-0">Hapus Akun</h4>
                                <small>Hapus akun Anda secara permanen.</small>
                                <p class="text-dark mt-3 text-left">
                                    Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.
                                </p>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" type="button">HAPUS AKUN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('user_delete') }}" method="post" class="needs-validation" novalidate>
                @csrf                    
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">HAPUS AKUN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin menghapus akun Anda? Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
                        <div class="form-group mt-4">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Harap masukan password anda.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-danger">HAPUS AKUN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
    @section('script')
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
    @endsection