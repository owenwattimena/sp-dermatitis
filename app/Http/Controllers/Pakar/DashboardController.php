<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penyakit;
use App\Gejala;
use App\User;
use App\Diagnosa;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['total_penyakit'] = Penyakit::all()->count(); 
        $data['total_gejala'] = Gejala::all()->count(); 
        $data['total_diagnosa'] = Diagnosa::all()->count(); 
        $data['total_user'] = User::all()->count(); 
        return view('pakar.pages.dashboard', $data);
    }
}