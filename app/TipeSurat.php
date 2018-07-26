<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Permohonan;
use App\SyaratSurat;
class TipeSurat extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nama_tipe','keterangan'
    ];

    protected $hidden = [
    	'id'
	];


    public function permohonan(){
        return $this->hasMany('App\Permohonan','id_tipe_surat','id');
    }

    public function syarat_surat(){
        return $this->hasMany('App\SyaratSurat','id_tipe_surat','id');
    }
}
