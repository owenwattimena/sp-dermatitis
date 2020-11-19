@extends('pakar.templates.layout')
@section('style')
<link rel="stylesheet" href="{{asset('assets/pakar/vendors/summernote/summernote-bs4.css')}}">
@endsection
@section('content')
<div class="col-md-12 col-sm-12 ">
    <form method="POST" action="{{route('disease_post')}}" class="needs-validation" novalidate>
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Penyakit
                    <p style="font-size: 8pt;" class="mt-1">Tambah data</p> 
                </h2> 
                <div class="clearfix"></div>
                <button class="btn btn-success btn-sm float-right mt-0" type="submit">TAMBAH</button>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="kode_penyakit">KODE PENYAKIT</label>
                                    <input type="text" id="kode_penyakit" name="kode_penyakit" value="{{$kode_penyakit}}" class="form-control" readonly required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="nama_penyakit">NAMA PENYAKIT</label>
                                    <input type="text" id="nama_penyakit" name="nama_penyakit" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label for="pengertian">PENGERTIAN</label>
                                    <textarea class="form-control textarea" id="pengertian" name="pengertian" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label for="saran">SARAN</label>
                                    <textarea class="form-control textarea" id="saran" name="saran" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection

@section('script')
<script src="{{asset('assets/pakar/vendors/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
@endsection