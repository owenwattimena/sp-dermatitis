@extends('pakar.templates.layout')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Data Penyakit</h2>
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
                                    <th class="p-0 text-center"><a href="{{route('disease_create')}}" class="btn btn-primary btn-sm"> Tambah </a></th>
                                    
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                @forelse($penyakit as $data)
                                <tr>
                                    <td>{{$data->kode_penyakit}}</td>
                                    <td>{{$data->nama_penyakit}}</td>
                                    <td class="text-center">
                                    <a href="{{url('pakar/disease/detail')}}/{{$data->kode_penyakit}}" class="btn btn-success btn-sm">Detail</a>
                                        <a href="{{url('pakar/disease/edit')}}/{{$data->kode_penyakit}}" class="btn btn-sm btn-warning">Ubah</a>
                                        <form class="d-inline" action="{{route('disease_delete', $data->kode_penyakit)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="kode_penyakit" value="{{$data->kode_penyakit}}">
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
    
@endsection