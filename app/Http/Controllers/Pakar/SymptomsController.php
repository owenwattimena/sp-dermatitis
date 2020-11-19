<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gejala;

class SymptomsController extends Controller
{
    public function index(){
        $data['gejala'] = Gejala::all();
        return view('pakar.pages.symptoms.index', $data);
    }

    public function create(){
        $gejala = Gejala::all(); 
        $total_gejala = $gejala->count(); 
        if ($total_gejala <= 0) {
            $kode_baru = 'G001';
        }else{
            $kode_baru = generate_code($gejala->last()->kode_gejala);
        }
        $data['kode_gejala'] = $kode_baru;
        return view('pakar.pages.symptoms.create', $data);
    }
    public function post(Request $request){
        if ($request) {

            $validatedData = $request->validate([
                'kode_gejala' => 'required|max:4|unique:gejala',
                'nama_gejala' => 'required',
                'keterangan' => 'required',
            ]);

            $gejala = new Gejala;
            $gejala->kode_gejala = $request->kode_gejala;
            $gejala->nama_gejala = $request->nama_gejala;
            $gejala->keterangan = $request->keterangan;
            
            if ($gejala->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil tambahkan!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal tambahkan!"
                ];
            }
            
            return redirect()->route('symptoms')->with($alert);
            
        }
    }

    public function edit($kode){
        $data['gejala'] = Gejala::where('kode_gejala', $kode)->get()->last();
        if($data['gejala'] == null){
            $alert = [
                "type" => "alert-warning",
                "msg"  => "Gejala dengan kode $kode tidak terdaftar!"
            ];
            return redirect()->route('symptoms')->with($alert);
        }
        return view('pakar.pages.symptoms.edit', $data);
    }

    public function put(Request $request, $kode){
        if ($request) {

            $validatedData = $request->validate([
                'kode_gejala' => 'required|max:4',
                'nama_gejala' => 'required',
                'keterangan' => 'required',
            ]);
            # code...
            $gejala = Gejala::where('kode_gejala', $kode)->get()->last();
            $gejala->nama_gejala = $request->nama_gejala;
            $gejala->keterangan = $request->keterangan;
            if ($gejala->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil diubah!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal diubah!"
                ];
            }
            return redirect()->route('symptoms')->with($alert);
        }
    }

    public function delete(Request $request, $kode){
        if ($request->kode_gejala === $kode) {
            # code...
            $gejala = Gejala::where('kode_gejala', $request->kode_gejala)->get()->last();
            if ($gejala->forceDelete()) {
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil hapus!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal dihapus!"
                ];   
            }
            return redirect()->route('symptoms')->with($alert);
        }
        return redirect()->route('symptoms');
    }
}