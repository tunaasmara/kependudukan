<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
	public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'id_jenis';



	public function kabupaten(){
        return $this->hasMany('App\Kabupaten','id_jenis','id_jenis');
    }

    public function desa(){
        return $this->hasMany('App\Desa','id_jenis','id_jenis');
    }
}
