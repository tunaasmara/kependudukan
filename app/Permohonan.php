<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Penduduk;
use App\TipeSurat;
use App\SyaratPermohonan;
class Permohonan extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'kode_permohonan','id_tipe_surat','id_penduduk','dipergunakan_untuk','status'
    ];

    protected $hidden = [
    	'id'
	];

	public function penduduk(){
        return $this->belongsTo('App\Penduduk','id_penduduk');
    }

    public function tipe_surat(){
        return $this->belongsTo('App\TipeSurat','id_tipe_surat');
    }

    public function syarat_permohonan(){
        return $this->hasMany('App\SyaratPermohonan','id_permohonan','id');
    }
}


