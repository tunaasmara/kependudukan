<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Kecamatan;
use App\Dusun;
use App\Jenis;
class Desa extends Model
{

    protected $table = 'kelurahan';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'id_kel';

	public function kecamatan(){
        return $this->belongsTo('App\Kecamatan','id_kec');
    }

    public function dusun(){
        return $this->hasMany('App\Dusun','id_kel','id_kel');
    }

    public function jenis(){
        return $this->belongsTo('App\Jenis','id_jenis');
    }
}
