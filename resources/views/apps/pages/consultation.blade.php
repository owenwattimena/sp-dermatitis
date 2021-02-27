@extends('apps.templates.layout')

@section('style')
    <!-- Data Table -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{asset('assets/pakar/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection 

@section('content')
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 order-md-2 pb-5 text-center">
                <img class="w-100" src="{{asset('assets/apps/images/doctor.png')}}" alt="stop-covid">
                <p class="lead">Halo {{Auth::user()->nama}}, apakah anda sedang mengalami hal-hal
                    berikut?
                </p>
            </div>
            <div class="col-md-6 order-md-1">
                @if (session('msg'))
                <div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
                    {!! session('msg') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <h1 class="display-5 text-primary text-center text-md-left">Konsultasi!
                </h1>
                
                <form action="{{route('diagnosis')}}" class="radio-toolbar" method="POST">
                    @csrf                    
                    <table id="dataTable" class="table">
                        <thead style="opacity: 0">
                            <th></th>
                        </thead>
                        <tbody>
                    @forelse ($gejala as $data)
                            <tr>
                                <td>
                                    <div class="card shadow-sm border-0 mb-3">
                                        <div class="card-body">
                                            <p class="mb-0">{{$data->nama_gejala}}?</p>
                                            <p class="text-success"><small>{{$data->keterangan}}?</small></p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="{{$data->kode_gejala}}"
                                                id="ragu{{$data->kode_gejala}}" value="0.2">
                                                <label class="form-check-label" for="ragu{{$data->kode_gejala}}">
                                                    Ragu-ragu
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="{{$data->kode_gejala}}"
                                                id="mungkin{{$data->kode_gejala}}" value="0.4">
                                                <label class="form-check-label" for="mungkin{{$data->kode_gejala}}">
                                                    Mungkin
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="{{$data->kode_gejala}}"
                                                id="sangat{{$data->kode_gejala}}" value="0.6">
                                                <label class="form-check-label" for="sangat{{$data->kode_gejala}}">
                                                    Sangat Mungkin
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="{{$data->kode_gejala}}"
                                                id="hampir{{$data->kode_gejala}}" value="0.8">
                                                <label class="form-check-label" for="hampir{{$data->kode_gejala}}">
                                                    Hampir Pasti
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="{{$data->kode_gejala}}"
                                                id="pasti{{$data->kode_gejala}}" value="1.0">
                                                <label class="form-check-label" for="pasti{{$data->kode_gejala}}">
                                                    Pasti
                                                </label>
                                            </div>
                                            {{-- <hr class="my-1"> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p class="text-left text-danger"> Balum ada data gejala. </p>
                            @endforelse
                        </tbody>
                      </table>
                    
                    
                    <div class="row justify-content-center">
                        <div class="col-12">
                            @if (count($gejala) > 0)
                            <button class="btn btn-success mt-3 btn-block" type="submit">DIAGNOSA</button>
                            @endif 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Datatables -->
    <script src="{{asset('assets/pakar/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    {{-- <script src="{{asset('assets/pakar/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script> --}}

    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
        $('.form-check-input').click(function(e){
            if (this.getAttribute('checked')) { // check the presence of checked attr
                $(this).removeAttr('checked'); // if present remove that
            } else {
                $(this).attr('checked', true); // if not then make checked
            }
        });
    </script>
@endsection
