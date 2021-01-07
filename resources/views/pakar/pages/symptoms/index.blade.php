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
            <h2>Data Gejala</h2>
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
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th class="p-0 text-center"><a href="{{route('symptoms_create')}}" class="btn btn-primary btn-sm"> Tambah </a></th>
                                </tr>
                            </thead>
                                                        
                            <tbody>
                                @forelse($gejala as $data)
                                <tr>
                                    <td>{{$data->kode_gejala}}</td>
                                    <td>{{$data->nama_gejala}}</td>
                                    <td>{{$data->keterangan}}</td>
                                    <td class="text-center">
                                        <a href="{{url('pakar/symptoms/edit')}}/{{$data->kode_gejala}}" class="btn btn-sm btn-warning">Ubah</a>
                                        <form class="d-inline" action="{{route('symptoms_delete', $data->kode_gejala)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="kode_gejala" value="{{$data->kode_gejala}}">
                                            <button type="submit" class="btn btn-sm btn-danger btn-delete" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>    
                                @empty
                                <tr>
                                    <td class="text-center text-danger" colspan="4">
                                        Tidak ada data!
                                    </td>
                                </tr>
                                @endforelse
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