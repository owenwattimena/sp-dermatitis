<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class AuthController extends Controller
{

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                # code...
                \Auth::login($user);
                \Auth::loginUsingId($user->id);
                return redirect()->route('consultation_now');
            }
        }
        $alert = [
            "type" => "alert-danger",
            "msg"  => "<b>Login gagal</b>.</br>Masukan username dan password yang benar!"
        ];
        return redirect()->back()->with($alert);
    }

    //
    public function post_register(Request $request){
        // dd($request);
        if ($request) {
            
            $validatedData = $request->validate(['nama' => 'required','email' => 'required|unique:users','password' => 'required|confirmed', 'tempat_lahir'=>'required', 'tanggal_lahir'=>'required', 'jenis_kelamin' => 'required|max:1', 'alamat'=>'required']);
            

            // if ($validatedData->fails()) {
            //     return redirect()->back()
            //                 ->withErrors($validator)
            //                 ->withInput();
            // }
            
            $user = new User;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->alamat = $request->alamat;
            
            if ($user->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Proses pendaftaran berhasil!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Proses pendaftaran gagal!"
                ];
            }
            
            return redirect()->route('app_login')->with($alert);
            
        }
    }
}