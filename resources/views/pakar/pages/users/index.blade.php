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
                        
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>TTL</th>
                                    <th>JENIS KELAMIN</th>
                                    <th class="p-0 text-center"></th>
                                    
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                @foreach($users as $data)
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</td>
                                    <td>{{($data->jenis_kelamin == 'l') ? 'Laki-laki' : 'perempuan'}}</td>
                                    <td class="text-center">
                                        <a href="{{url('expert/user/detail')}}/{{$data->id}}" class="btn btn-sm btn-success">Lihat</a>
                                    </td>
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