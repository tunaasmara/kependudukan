<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Penduduk;
use App\Kk;
class AnggotaKk extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'id_kk','id_penduduk','no_paspor','status'
    ];

    protected $hidden = [
    	'id'
	];

	public function penduduk(){
        return $this->belongsTo('App\Penduduk','id_penduduk');
    }

    public function kk(){
        return $this->belongsTo('App\Kk','id_kk');
    }
}

 
