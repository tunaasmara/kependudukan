<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Provinsi;
use App\Kecamatan;
use App\Jenis;
class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'id_kab';

	public function provinsi(){
        return $this->belongsTo('App\Provinsi','id_prov');
    }

    public function kecamatan(){
        return $this->hasMany('App\Kecamatan','id_kab','id_kab');
    }

    public function jenis(){
        return $this->belongsTo('App\Jenis','id_jenis');
    }

}
