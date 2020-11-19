<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Diagnosa;
class UserController extends Controller
{
    public function index(){
        $data['users'] = User::all();
        return view('pakar.pages.users.index', $data);
    }

    public function detail($id){
        $data['user'] = User::findOrFail($id);
        $data['diagnosa'] = Diagnosa::where('id_user', $id)->get();
        return view('pakar.pages.users.detail',$data);
    }
}