@extends('pakar.templates.layout')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <form method="POST" action="{{route('symptoms_put', $gejala->kode_gejala)}}" class="needs-validation" novalidate>
        @method('put')
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Gejala
                    <p style="font-size: 8pt;" class="mt-1">Ubah data</p> 
                </h2> 
                <div class="clearfix"></div>
                <button class="btn btn-success btn-sm float-right mt-0">UBAH</button>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="kode_gejala">KODE GEJELA</label>
                                    <input type="text" id="kode_gejala" name="kode_gejala" class="form-control" value="{{$gejala->kode_gejala}}" readonly required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="nama_gejala">NAMA GEJALA</label>
                                    <input type="text" id="nama_gejala" name="nama_gejala" class="form-control" value="{{$gejala->nama_gejala}}" required>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{$gejala->keterangan}}</textarea>
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
</div>
@endsection
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