<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //
    // protected $table = "rules";
    public $timestamps = false;

    public function gejala(){
        // return $this->morphTo("App\Gejala", 'kode_gejala', 'kode');
        // return $this->belongsTo("App\Gejala", 'kode_gejala(rule)', 'kode_gejala(gejala)');
        return $this->belongsTo("App\Gejala", 'kode_gejala', 'kode_gejala');
    }
    
    public function penyakit(){
        // return $this->morphTo("App\Penyakit", 'kode_penyakit', 'kode');
        return $this->belongsTo("App\Penyakit", 'kode_penyakit', 'kode_penyakit');
    }
}