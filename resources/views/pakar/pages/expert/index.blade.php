@extends('pakar.templates.layout')

@section('content')
<div class="col-md-7 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Profil Pakar</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="text-center">
                <img width="100" src="{{asset('assets/pakar/images/stetoskop-icon.webp')}}" alt="profil pakar" class="img-circle m-0 mb-3">
                <h6>{{\Auth::guard('expert')->user()->username}}</h6>
            </div>
            <form method="POST" action="{{route('profile_put', \Auth::guard('expert')->user()->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{\Auth::guard('expert')->user()->nama}}" required>
                </div>
                
                <button type="submit" class="btn btn-secondary btn-block">Ubah Profil</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-5 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ganti Password</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form method="POST" action="{{route('password_put')}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password-baru">PASSWORD BARU</label>
                    <input type="password" class="form-control" id="password-baru" name="password_baru" required>
                </div>
                <div class="form-group">
                    <label for="konfirmasi-password">KONFIRMASI PASSWORD</label>
                    <input type="password" class="form-control" id="konfirmasi-password" name="password_baru_confirmation" required>
                </div>
                <button type="submit" class="btn btn-danger btn-block">Ganti Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
