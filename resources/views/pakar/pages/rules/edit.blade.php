@extends('pakar.templates.layout')
@section('style')
    {{-- Select 2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
@endsection
@section('content')
<div class="col-md-12 col-sm-12 ">
<form method="POST" action="{{route('rule_put', $rule->id)}}" class="needs-validation" novalidate>
    @method('put')
    @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Aturan
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
                                <div class="col-md-5">
                                    <label for="penyakit">PENYAKIT</label>
                                    <select class="select form-control" id="penyakit" name="penyakit" required>
                                        <option value="">Pilih Penyakit</option>
                                        @foreach ($penyakit as $data)
                                        @if ($data->kode_penyakit === $rule->kode_penyakit)
                                            <option value="{{$data->kode_penyakit}}" selected>{{$data->nama_penyakit}}</option>
                                        @else
                                            <option value="{{$data->kode_penyakit}}">{{$data->nama_penyakit}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="gejala">GEJALA</label>
                                    <select class="select form-control" id="gejala" name="gejala" required>
                                        <option value="">Pilih Penyakit</option>
                                        @foreach ($gejala as $data)
                                        @if ($data->kode_gejala === $rule->kode_gejala)
                                        <option value="{{$data->kode_gejala}}" selected>{{$data->nama_gejala}}</option>
                                            
                                        @else
                                            
                                        <option value="{{$data->kode_gejala}}">{{$data->nama_gejala}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="bobot_pakar">BOBOT PAKAR</label>
                                    <input type="number" step="0.01" min="0.0" max="1.0" id="bobot_pakar" value="{{$rule->bobot_pakar}}" name="bobot_pakar" class="form-control" required>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        let select2_penyakit = $('.select').select2({
            placeholder: 'Masukkan Penyakit',
        });
        
        let select2_gejala = $('.select').select2(
        {
            placeholder: 'Masukan Gejala',
        }
        );
    </script>
@endsection