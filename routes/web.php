<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('apps.pages.home');
})->name('home');

Route::get('/about-dermatitis', function () {
    $data['penyakit'] = \App\Penyakit::all();
    return view('apps.pages.about_dermatitis', $data);
})->name('about_dermatitis');

Route::get('/login-alert', function () {
    return view('apps.auth.login_alert');
})->name('login_alert');

Route::get('/login', function () {
    if (\Auth::check()) {
        return redirect('/');
    }
    return view('apps.auth.login');
})->name('app_login');

Route::post('/login', 'App\AuthController@login')->name('user_login');

Route::get('/register', function () {
    return view('apps.auth.register');
})->name('register');
Route::post('/register', 'App\AuthController@post_register')->name('register_create');

/**
* AUTH GROUP FOR USER
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/consultation-now', 'App\ConsultationController@index')->name('consultation_now');
    Route::get('consultation', 'App\ConsultationController@consultation')->name('consultation');
    Route::post('/diagnosis', 'App\ConsultationController@diagnosis')->name('diagnosis');
    Route::get('/diagnosis-history', 'App\ConsultationController@consultation_history')->name('diagnosis_history');
    Route::get('/profile', 'App\UserController@index')->name('user_profile');
    Route::put('/profile', 'App\UserController@profile')->name('user_profile_put');
    Route::put('/password', 'App\UserController@password')->name('user_password');
    Route::get('/logout', function(){
        \Auth::logout();
        return redirect('/');
    })->name('user_logout');
});
/**
* ---------------------------------------------------------------
*  LOGIN ROUTE FOR EXPERT
* ---------------------------------------------------------------
*/

Route::get('/auth', 'Pakar\AuthController@index')->name('auth');
Route::post('/auth', 'Pakar\AuthController@login')->name('login');

//----------------------------------------------------------------

/**
* -------------------------------------------------------------
* EXPERT ROUTE AND AUTHENTICATION
* -------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:expert']], function () {
    Route::get('/auth/logout', function(){
        \Auth::guard('expert')->logout();
        return redirect('/');
    })->name('auth_logout');
    
    Route::group(['prefix' => 'pakar'], function () {
        
        Route::get('/', 'Pakar\DashboardController@index')->name('dashboard');
        
        Route::group(['prefix' => 'disease'], function () {
            
            Route::get('/', 'Pakar\DiseaseController@index')->name('disease');
            
            Route::get('create', 'Pakar\DiseaseController@create')->name('disease_create');
            Route::post('create', 'Pakar\DiseaseController@post')->name('disease_post');
            
            
            Route::get('detail/{kode}', 'Pakar\DiseaseController@detail')->name('disease_detail');
            
            Route::get('edit/{kode}', 'Pakar\DiseaseController@edit')->name('disease_edit');
            Route::put('edit/{kode}', 'Pakar\DiseaseController@put')->name('disease_put');
            
            Route::delete('delete/{kode}', 'Pakar\DiseaseController@delete')->name('disease_delete');
        });
        
        Route::group(['prefix' => 'symptoms'], function() {
            
            Route::get('/', 'Pakar\SymptomsController@index')->name('symptoms');
            
            Route::get('create', 'Pakar\SymptomsController@create')->name('symptoms_create');
            Route::post('create', 'Pakar\SymptomsController@post')->name('symptoms_post');
            
            Route::get('edit/{kode}', 'Pakar\SymptomsController@edit')->name('symptoms_edit');
            Route::put('edit/{kode}', 'Pakar\SymptomsController@put')->name('symptoms_put');
            
            Route::delete('delete/{kode}', 'Pakar\SymptomsController@delete')->name('symptoms_delete');
        });
        
        Route::group(['prefix' => 'rule'], function() {
            Route::get('/', 'Pakar\RuleController@index')->name('rule');
            
            Route::get('create', 'Pakar\RuleController@create')->name('rule_create');
            Route::post('create', 'Pakar\RuleController@post')->name('rule_post');
            
            Route::get('edit/{id}', 'Pakar\RuleController@edit')->name('rule_edit');
            Route::put('edit/{id}', 'Pakar\RuleController@put')->name('rule_put');
            
            Route::delete('delete/{id}', 'Pakar\RuleController@delete')->name('rule_delete');
        });
        
        
        Route::get('user', 'Pakar\UserController@index')->name('user');
        
        Route::get('user/detail/{id}', 'Pakar\UserController@detail');
        
        
        Route::group(['prefix' => 'profile'], function() {
            
            Route::get('/', 'Pakar\ExpertController@index')->name('profile');
            Route::put('/', 'Pakar\ExpertController@put_profile')->name('profile_put');
            Route::put('password', 'Pakar\ExpertController@put_password')->name('password_put');
        });
    });
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');