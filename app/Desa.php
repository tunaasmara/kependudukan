<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Kecamatan;
use App\Dusun;
class Desa extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'id_kecamatan','nama_desa','kepala_desa'
    ];

    protected $hidden = [
    	'id'
	];

	public function kecamatan(){
        return $this->belongsTo('App\Kecamatan','id_kecamatan');
    }

    public function dusun(){
        return $this->hasMany('App\Dusun','id_desa','id');
    }
}
