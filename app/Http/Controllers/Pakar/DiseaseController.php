<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penyakit;

class DiseaseController extends Controller
{
    //
    public function index(){
        $data['penyakit'] = Penyakit::orderBy('kode_penyakit', 'asc')->get();
        return view('pakar.pages.disease.index', $data);
    }
    
    public function detail($kode){

        $data['penyakit'] = Penyakit::where('kode_penyakit', $kode)->orderBy('kode_penyakit', 'asc')->get()->last();
        if($data['penyakit'] == null){
            $alert = [
                "type" => "alert-warning",
                "msg"  => "Penyakit dengan kode $kode tidak terdaftar!"
            ];
            return redirect()->route('disease')->with($alert);
        }
        return view('pakar.pages.disease.detail', $data);
       
    }

    public function create(){

        $penyakit = Penyakit::all(); 
        $total_penyakit = $penyakit->count(); 
        if ($total_penyakit <= 0) {
            $kode_baru = 'P001';
        }else{
            $kode_baru = generate_code($penyakit->last()->kode_penyakit);
        }
        $data['kode_penyakit'] = $kode_baru;
        return view('pakar.pages.disease.create', $data);
    }

    public function post(Request $request){
        if ($request) {

            $validatedData = $request->validate([
                'kode_penyakit' => 'required|max:4|unique:penyakit',
                'nama_penyakit' => 'required',
                'pengertian' => 'required',
                'saran' => 'required',
            ]);

            $penyakit = new Penyakit;
            $penyakit->kode_penyakit = $request->kode_penyakit;
            $penyakit->nama_penyakit = $request->nama_penyakit;
            $penyakit->pengertian = $request->pengertian;
            $penyakit->saran = $request->saran;
            
            if ($penyakit->save()) {
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
            
            return redirect()->route('disease')->with($alert);
            
        }
    }

    public function edit($kode){
        $data['penyakit'] = Penyakit::where('kode_penyakit', $kode)->get()->last();
        if($data['penyakit'] == null){
            $alert = [
                "type" => "alert-warning",
                "msg"  => "Penyakit dengan kode $kode tidak terdaftar!"
            ];
            return redirect()->route('disease')->with($alert);
        }
        return view('pakar.pages.disease.edit', $data);
        
    }

    public function put(Request $request, $kode){
        if ($request) {

            $validatedData = $request->validate([
                'kode_penyakit' => 'required|max:4',
                'nama_penyakit' => 'required',
                'pengertian' => 'required',
                'saran' => 'required',
            ]);
            # code...
            $penyakit = Penyakit::where('kode_penyakit', $kode)->get()->last();
            $penyakit->nama_penyakit = $request->nama_penyakit;
            $penyakit->pengertian = $request->pengertian;
            $penyakit->saran = $request->saran;
            if ($penyakit->save()) {
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
            return redirect()->route('disease')->with($alert);
        }
    }

    public function delete(Request $request, $kode){
        if ($request->kode_penyakit === $kode) {
            # code...
            $penyakit = Penyakit::where('kode_penyakit', $request->kode_penyakit)->get()->last();
            if ($penyakit->forceDelete()) {
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
            return redirect()->route('disease')->with($alert);
        }
        return redirect()->route('disease');
    }

}