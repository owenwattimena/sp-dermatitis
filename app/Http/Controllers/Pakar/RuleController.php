<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rule;
use App\Gejala;
use App\Penyakit;

class RuleController extends Controller
{
    public function index(){
        $data['penyakit'] = Penyakit::all();
        $data['gejala'] = Gejala::all();
        $data['rules'] = Rule::with(['gejala', 'penyakit'])->get();
        return view('pakar.pages.rules.index', $data);
    }
    
    public function create(){
        $data['penyakit'] = Penyakit::all();
        $data['gejala'] = Gejala::all();
        return view('pakar.pages.rules.create',$data);
    }
    
    public function post(Request $request){
        if ($request) {
            
            $validatedData = $request->validate(['penyakit' => 'required|max:4','gejala' => 'required|max:4','bobot_pakar' => 'required',]);
            
            $rule_exist = Rule::where([["kode_penyakit", "=", $request->penyakit],["kode_gejala", "=", $request->gejala]])->get()->count();
            
            if($rule_exist > 0){
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data sudah ada!"
                ];
                return redirect()->route('rule_create')->with($alert);
                
            }
            
            $rule = new Rule;
            $rule->kode_penyakit = $request->penyakit;
            $rule->kode_gejala = $request->gejala;
            $rule->bobot_pakar = $request->bobot_pakar;
            
            if ($rule->save()) {
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
            
            return redirect()->route('rule')->with($alert);
            
        }
    }
    
    public function edit($id){
        $data['penyakit'] = Penyakit::all();
        $data['gejala'] = Gejala::all();
        
        $data['rule'] = Rule::where('id', $id)->get()->last();
        if($data['rule'] == null){
            $alert = [
                "type" => "alert-warning",
                "msg"  => "Aturan dengan id $id tidak terdaftar!"
            ];
            return redirect()->route('rule')->with($alert);
        }
        return view('pakar.pages.rules.edit', $data);
    }
    public function put(Request $request, $id){
        if ($request) {
            
            $validatedData = $request->validate(['penyakit' => 'required|max:4','gejala' => 'required|max:4','bobot_pakar' => 'required',]);
            
            $rule_exist = Rule::where([["kode_penyakit", "=", $request->penyakit],["kode_gejala", "=", $request->gejala],["id", "!=", $id]])->get()->count();
            
            if($rule_exist > 0){
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data sudah ada!"
                ];
                return redirect()->route('rule_edit', $id)->with($alert);
                
            }
            # code...
            $rule = Rule::where('id', $id)->get()->last();
            $rule->kode_penyakit = $request->penyakit;
            $rule->kode_gejala = $request->gejala;
            $rule->bobot_pakar = $request->bobot_pakar;
            if ($rule->save()) {
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
            return redirect()->route('rule')->with($alert);
        }
    }
    
    public function delete(Request $request, $id){
        if ($request->id === $id) {
            # code...
            $rule = Rule::where('id', $request->id)->get()->last();
            if ($rule->forceDelete()) {
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
            return redirect()->route('rule')->with($alert);
        }
        return redirect()->route('rule');
    }
}