<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('pakar.auth.login');
    }
    
    public function login(Request $request){
        $pakar = Pakar::where('username', $request->username)->first();
        if ($pakar) {
            if (Hash::check($request->password, $pakar->password)) {
                # code...
                \Auth::guard('expert')->login($pakar);
                \Auth::loginUsingId($pakar->id);
                return redirect('pakar');
            }
        }
        return redirect()->back()->with('msg', '<b>Login gagal</b>.</br>Masukan username dan password yang benar!');
    }
}