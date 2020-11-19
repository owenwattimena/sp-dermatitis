<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index(){
        return view('apps.pages.profile');
    }
    public function profile(Request $request){
        if ($request) {

            $validatedData = $request->validate([
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
            ]);
            # code...
            $user = User::where('id', \Auth::user()->id)->get()->last();
            $user->nama = $request->nama;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->alamat = $request->alamat;
            if ($user->save()) {
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
            return redirect()->route('user_profile')->with($alert);
        }
    }
    
    public function password(Request $request){
        if ($request) {

            $validatedData = $request->validate([
                'password' => 'required',
                'password_baru' => 'required|confirmed',
            ]);

            $user = User::findOrFail(\Auth::user()->id);
            if (!Hash::check($request->password, $user->password)) {
                # code...
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Password salah!"
                ];
                return redirect()->route('user_profile')->with($alert);
            }
            $user->password = Hash::make($request->password_baru);
            if ($user->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil diubah!"
                ];
                \Auth::logout();
                return redirect('login');
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal diubah!"
                ];
                return redirect()->route('user_profile')->with($alert);
            }
        }
    }
}