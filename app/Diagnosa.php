<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    //
    protected $table = "diagnosa";
    public $timestamps = false;

    public function user(){
        // return $this->morphTo("App\Gejala", 'kode_gejala', 'kode');
        // return $this->belongsTo("App\Gejala", 'diagnosa', 'user');
        return $this->belongsTo("App\User", 'id_user', 'id');
    }
    
    public function penyakit(){
        // return $this->morphTo("App\Penyakit", 'kode_penyakit', 'kode');
        return $this->belongsTo("App\Penyakit", 'kode_penyakit', 'kode_penyakit');
    }
}