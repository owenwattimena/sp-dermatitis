<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Pakar;

class ExpertController extends Controller
{
    //
    public function index(){
        return view('pakar.pages.expert.index');
    }
    public function put_profile(Request $request){
        if ($request) {

            $validatedData = $request->validate([
                'nama' => 'required',
            ]);
            # code...
            $expert = Pakar::where('id', \Auth::guard('expert')->user()->id)->get()->last();
            $expert->nama = $request->nama;
            if ($expert->save()) {
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
            return redirect()->route('profile')->with($alert);
        }
    }
    
    public function put_password(Request $request){
        if ($request) {

            $validatedData = $request->validate([
                'password' => 'required',
                'password_baru' => 'required|confirmed',
            ]);

            $pakar = Pakar::where('id', \Auth::guard('expert')->user()->id)->get()->last();
            if (!Hash::check($request->password, $pakar->password)) {
                # code...
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Password salah!"
                ];
                return redirect()->route('profile')->with($alert);
            }
            $pakar->password = Hash::make($request->password_baru);
            if ($pakar->save()) {
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
            return redirect()->route('profile')->with($alert);
        }
    }
}