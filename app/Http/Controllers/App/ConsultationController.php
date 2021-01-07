<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gejala;
use App\Penyakit;
use App\Diagnosa;
use App\Rule;

class ConsultationController extends Controller
{
    //
    public function index(){
        return view('apps.pages.consultation_now');
    }

    public function consultation(){
        $data['gejala'] = Gejala::all();
        return view('apps.pages.consultation', $data);
    }

    public function diagnosis(Request $request){
        // Cek apakah adata gejala yang telah dipilih
        if(count($request->all()) <= 1){
            $alert = [
                "type" => "alert-danger",
                "msg"  => "Mohon pilih gejala!"
            ];
            return redirect()->route('consultation')->with($alert);
        }
        

        $data = [];
        $gejala_pasien = $request->except('_token');
        if($gejala_pasien){
            $penyakit = Penyakit::all();
            
            // gejala
            foreach ($gejala_pasien as $key => $value) {
                $gejala = Gejala::where('kode_gejala', $key)->first();
                if($gejala){
                    $data['gejala'][] = [
                        "kode" => $gejala->kode_gejala,
                        "nama" => $gejala->nama_gejala
                    ];
                }
            }
            // dd($data['gejala']);
            
            // rule
            // $data['rules'] = [];
            foreach ($penyakit as $penyakit_key => $penyakit_value) {
                foreach ($gejala_pasien as $gejala_key => $gejala_value) {
                    $rule = Rule::where('kode_penyakit', $penyakit_value->kode_penyakit)->where('kode_gejala', $gejala_key)->with(['gejala', 'penyakit'])->first();
                    if($rule){
                        $data['rules'][$penyakit_key]['kode'] = $penyakit_value->kode_penyakit;
                        $data['rules'][$penyakit_key]['penyakit'] = $penyakit_value->nama_penyakit;
                        $data['rules'][$penyakit_key]['gejala'][] = [
                            'kode' => $rule->gejala->kode_gejala,
                            'nama' => $rule->gejala->nama_gejala,
                            'bobot_pakar' => $rule->bobot_pakar,
                            'bobot_user' => $gejala_value
                        ];
                    }
                }
            }

            // Cek ketersediaan nilai rules
            if(!isset($data['rules'])){
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Mohon maaf. untuk saat ini sistem belum bisa melakukan diagnosa!"
                ];
                return redirect()->route('consultation')->with($alert);
            } 
            // dd($data['rules']);
            // cf
            foreach ($data['rules'] as $rule_key => $rule_value) {
                $data['data_CF'][$rule_key]['kode_penyakit'] = $rule_value['kode']; 
                $data['data_CF'][$rule_key]['penyakit'] = $rule_value['penyakit']; 
                foreach ($rule_value['gejala'] as $gejela_key => $gejala_value) {
                    $data['data_CF'][$rule_key]['CF'][] = $gejala_value['bobot_pakar'] * $gejala_value['bobot_user']; 
                }
            }
            // dd($data['data_CF']);
            
            // cf combine
            foreach ($data['data_CF'] as $data_cf_key => $data_cf_value) {
                $length = count($data_cf_value['CF']) - 1;
                $cf_combine = 0;
                foreach ($data_cf_value['CF'] as $cf_key => $cf_value) {
                    // dd($cf_value);
                    if($length == $cf_key){
                    break;
                    }   
                
                    $data['data_CF_combine'][$data_cf_key]['kode_penyakit'] = $data_cf_value['kode_penyakit'];
                    $data['data_CF_combine'][$data_cf_key]['penyakit'] = $data_cf_value['penyakit'];
                    
                    if ($cf_key == 0) {
                        $cf_combine = $cf_value;
                    }

                    $cf_combine = $cf_combine + ($data_cf_value['CF'][$cf_key + 1] * (1 - $cf_combine));
                    $data['data_CF_combine'][$data_cf_key]['CF_Combine'][] = $cf_combine;
                
                    // $new_cf = 
                }
                
            }
            // dd($data['data_CF_combine']);
            
            // hasil akhir
            $nilai_cf = [];
            $list_penyakit = [];
            if(!isset($data['data_CF_combine'])){
                foreach ($data['data_CF'] as $data_cf_key => $data_cf_value) {
                    $list_kode_penyakit[] = $data_cf_value['kode_penyakit'];  
                    $list_penyakit[] = $data_cf_value['penyakit'];  
                    $nilai_cf[] = end($data_cf_value['CF']);
                }
                $cf_max = max($nilai_cf); 
                // dd($list_penyakit);
                $penyakit = $list_penyakit[array_search($cf_max, $nilai_cf)];
                $kode_penyakit = $list_kode_penyakit[array_search($cf_max, $nilai_cf)];

            }else{
                foreach ($data['data_CF'] as $data_cf_key => $data_cf_value) {
                    $list_kode_penyakit[] = $data_cf_value['kode_penyakit'];  
                    $list_penyakit[] = $data_cf_value['penyakit'];  
                    $nilai_cf[] = end($data_cf_value['CF']);
                }
                foreach ($data['data_CF_combine'] as $data_cf_key => $data_cf_value) {
                    $list_kode_penyakit[] = $data_cf_value['kode_penyakit'];  
                    $list_penyakit[] = $data_cf_value['penyakit'];  
                    $nilai_cf[] = end($data_cf_value['CF_Combine']);
                }
                // dump($list_penyakit);
                // dump($nilai_cf);
                $cf_max = max($nilai_cf); 
                $penyakit = $list_penyakit[array_search($cf_max, $nilai_cf)];
                $kode_penyakit = $list_kode_penyakit[array_search($cf_max, $nilai_cf)];
            }

            $data['nilai_akhir'] = [
                'kode' => $kode_penyakit,
                'penyakit' => $penyakit,
                'CF' => $cf_max,
                'persentase' => $cf_max * 100
            ];
            $data['penyakit'] = Penyakit::where('kode_penyakit', $kode_penyakit)->first();
            // dd($data);
            $diagnosa = new Diagnosa;
            $diagnosa->id_user = \Auth::user()->id;
            $diagnosa->kode_penyakit = $data['nilai_akhir']['kode'];
            $diagnosa->nilai_cf = $data['nilai_akhir']['CF'];
            $diagnosa->tanggal = date("Y-m-d H:i:s");
            $diagnosa->save();
        }


       
        return view('apps.pages.diagnosis', $data);
    }

    public function consultation_history(){
        $data['diagnosa'] = Diagnosa::where('id_user', \Auth::user()->id)->with(['penyakit'])->get();
        $data['jumlah_diagnosa'] = count($data['diagnosa']);
        return view('apps.pages.diagnosis_history',$data);
    }
}