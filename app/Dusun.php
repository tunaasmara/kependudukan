<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Desa;
use App\Rw;
class Dusun extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'id_desa','nama_dusun','kepala_dusun'
    ];

    protected $hidden = [
    	'id'
	];

	public function desa(){
        return $this->belongsTo('App\Desa','id_desa');
    }

    public function rw(){
        return $this->hasMany('App\Rw','id_dusun','id');
    }
}
