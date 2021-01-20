@extends('pakar.templates.layout')
@section('style')
    <!-- Data Table -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{asset('assets/pakar/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Pengguna</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="{{$user->nama}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" readonly class="form-control-plaintext" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat & Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="{{$user->tempat_lahir}}, {{$user->tanggal_lahir}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="{{($user->jenis_kelamin == 'l') ? 'Laki-laki' : 'Perempuan'}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="{{$user->alamat}}">
                                </div>
                            </div>
                        </form>
                        <h6 class="mt-5 text-dark font-weight-bold">Riwayat Konsultasi</h6>
                        <hr>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>TANGGAL</th>
                                    <th>PENYAKIT</th>
                                    <th>NILAI CF</th>
                                    
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                @foreach ($diagnosa as $data)
                                <tr>
                                    <th scope="row">{{$data->tanggal}}</th>
                                <td>{{$data->penyakit->nama_penyakit}}</td>
                                <td>{{$data->nilai_cf}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Datatables -->
    <script src="{{asset('assets/pakar/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
@endsection