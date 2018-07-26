<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\TipeSurat;
use App\SyaratPermohonan;
class SyaratSurat extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_tipe_surat','syarat','nilai_syarat'
    ];

    protected $hidden = [
    	'id'
	];

	public function tipe_surat(){
        return $this->belongsTo('App\TipeSurat','id_tipe_surat');
    }

    public function syarat_permohonan(){
        return $this->hasMany('App\SyaratPermohonan','id_syarat_surat','id');
    }
}
